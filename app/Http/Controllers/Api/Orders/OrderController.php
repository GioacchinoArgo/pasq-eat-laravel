<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Dish;
use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        //Generazione del token da restituire al Client
        $token = $gateway->clientToken()->generate();

        if ($token) {
            $data = [
                'token' => $token
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Non abbiamo l\'autorizzazione a proseguire con il pagamento! Transazione fallita',
            ];
            return response()->json($data, 401);
        }
    }

    public function makePayment(Request $request, Gateway $gateway)
    {

        // Valido i campi che mi arrivano dal frontend nella request
        $request->validate(
            [
                'restaurant_id' => 'required',
                'name' => 'required|string|min:3',
                'lastname' => 'required|string|min:3',
                'address' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:11',
                'dishes' => 'required|array',
                'payment_method_nonce' => 'required',
                'card_number' => 'required|string|digits:16',
                'card_expire_date' => 'required|string'
            ],
            [
                'restaurant_id.required' => 'Campo obbligatorio',
                'name.required' => 'Campo obbligatorio',
                'name.min' => 'Il nome deve avere almeno :min caratteri',
                'lastname.required' => 'Campo obbligatorio',
                'lastname.min' => 'Il nome deve avere almeno :min caratteri',
                'address.required' => 'Campo obbligatorio',
                'email.required' => 'Campo obbligatorio',
                'email.email' => 'Inserire una mail valida',
                'phone_number.required' => 'Campo obbligatorio',
                'phone_number.min' => 'Il numero avere :min cifre',
                'phone_number.max' => 'Il numero avere :max cifre',
                'dishes.required' => 'E\' necessario inserire dei piatti nel carrello',
                'dishes.array' => 'Il formato ricevuto non è corretto',
                'card_number.required' => 'Campo obbligatorio',
                'card_number.digits' => 'Il numero carta deve essere di :digits cifre',
                'card_expire_date.required' => 'Campo obbligatorio',
            ]
        );

        // Se alcuni campi non arrivano correttamente la transazione verrà annullata
        if (
            !$request->restaurant_id || !$request->name || !$request->lastname ||
            !$request->address || !$request->email || !$request->phone || !$request->dishes ||
            !$request->payment_method_nonce || !$request->card_number || !$request->card_expire_date
        ) {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita'
            ];
            return response()->json($data, 401);
        } else {

            // Recupero i piatti
            $dishes = $request->dishes;

            // calcolo il totale dell'ordine
            $total = 0;

            foreach ($dishes as $dish) {
                $price = $dish['price'];
                $total += $price;
            }
        }

        // Attribuisco forzatamente il token per il metodo di pagamento
        $nonce = $request->payment_method_nonce;

        // Assegno il totale e stabilisco sempre che abbia due numeri decimali
        $total = number_format($total, 2, '.', '');

        // Elaborazione e validazione dei parametri dell'ordine
        $result = $gateway->transaction()->sale([
            // dati della transazione
            'amount' => $total,
            'paymentMethodNonce' => $nonce,

            // dati del cliente
            'customer' => [
                'firstName' => $request->name,
                'lastName' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
            ],

            // dettagli della consegna
            'shipping' => [
                'firstName' => $request->name,
                'lastName' => $request->lastname,
                'streetAddress' => $request->address,
            ],

            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Creo un nuovo ordine
        $order = new Order([
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total
        ]);


        // Salvo l'ordine
        $order->save();

        //Restituzione dell'esito della transazione
        if ($result->success) {

            //assegno il valore true all'ordine e salvo
            $order->status = true;
            $order->save();

            // restituisco l'esito al front
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo',
                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $total
            ];

            return response()->json($data, 200);
        } else {

            // restituisco l'esito al front
            $data = [
                'success' => false,
                'message' => 'Qualcosa è andato storto! Transazione fallita',
                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'address' => $request->address,
                'total' => $total
            ];
            return response()->json($data, 401);
        }
    }
}
