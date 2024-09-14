<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Recuperiamo gli ordini
        $orders = Order::where('restaurant_id', Auth::id())->orderByDesc('created_at')->get();

        // Recuperiamo le informazioni del ristorante
        $restaurant = Restaurant::whereId(Auth::id())->first();
        $restaurant_name = $restaurant->restaurant_name;

        // Giriamo sugli ordini del ristorante per successivamente calcolare il totale
        $total_orders = 0;
        foreach ($orders as $order) {
            $total_orders += $order->total;
        }

        return view('admin.orders.index', compact('orders', 'restaurant_name', 'total_orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Recuperiamo le informazioni del ristorante
        $restaurant = Restaurant::whereId(Auth::id())->first();
        $restaurant_name = $restaurant->restaurant_name;

        $dishes = $order->dishes()->get();

        if ($restaurant->user_id !== Auth::id()) {
            abort(404);
        };

        if ($order->restaurant_id !== $restaurant->id) {
            abort(404);
        };

        $total_price = 0;
        foreach ($dishes as $dish) {
            $total_price += $dish->pivot->total_price;
        }

        return view('admin.orders.show', compact('order', 'restaurant_name', 'dishes', 'total_price'));
    }

    public function graphs(Request $request)
    {
        // Recuperiamo gli ordini
        $orders = Order::where('restaurant_id', Auth::id())->orderBy('created_at')->get();

        // Recuperiamo le informazioni del ristorante
        $restaurant = Restaurant::whereId(Auth::id())->first();
        $restaurant_name = $restaurant->restaurant_name;

        // Recupero i piatti
        $dishes = $restaurant->dishes()->get();

        // Recupero i piatti del singolo ordine
        $total_dishes = [];
        foreach ($orders as $order) {

            $order_dishes = $order->dishes()->get();


            foreach ($order_dishes as $dish) {
                $total_dishes[] = $dish['name'];
            }
        }

        $dish_counts = [];
        foreach ($total_dishes as $dish) {
            if (isset($dish_counts[$dish])) {
                // Se il titolo esiste già nell'array di conteggio, incrementa il valore
                $dish_counts[$dish]++;
            } else {
                // Altrimenti, inizializza il conteggio a 1
                $dish_counts[$dish] = 1;
            }
        }

        return view('admin.orders.graphs', compact('orders', 'restaurant_name', 'dishes', 'dish_counts'));
    }
}
