<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\DishOrder;
use App\Models\Order;
use App\Models\Restaurant;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {

        $restaurants = Restaurant::pluck('id')->toArray();
        $dishes = Dish::pluck('id')->toArray();

        $indirizzi = [
            'Via Roma 1', 'Via Milano 2', 'Piazza Venezia 3', 'Viale Europa 4', 'Corso Italia 5', 'Via Torino 6', 'Via Napoli 7', 'Via Genova 8', 'Piazza Garibaldi 9', 'Viale Libertà 10',
            'Via Firenze 11', 'Corso Vittorio Emanuele 12', 'Via Trieste 13', 'Via Bologna 14', 'Via Bari 15', 'Piazza Dante 16', 'Viale dei Mille 17', 'Corso Garibaldi 18', 'Via Verdi 19', 'Via Cavour 20',
            'Via Dante 21', 'Via Petrarca 22', 'Viale Mazzini 23', 'Via Alfieri 24', 'Corso Matteotti 25', 'Via Leopardi 26', 'Via Puccini 27', 'Piazza Manzoni 28', 'Via Foscolo 29', 'Via Tasso 30',
            'Via Alfieri 31', 'Via Carducci 32', 'Via Gioberti 33', 'Piazza Mazzini 34', 'Via Alfieri 35', 'Via Tasso 36', 'Via Verdi 37', 'Via Cavour 38', 'Viale delle Terme 39', 'Via degli Alpini 40',
            'Via degli Etruschi 41', 'Via degli Ulivi 42', 'Via delle Acacie 43', 'Via delle Rose 44', 'Via delle Camelie 45', 'Via delle Magnolie 46', 'Via delle Gardenie 47', 'Via delle Ginestre 48', 'Via delle Betulle 49', 'Via dei Pini 50',
            'Via degli Abeti 51', 'Via dei Castagni 52', 'Via dei Larici 53', 'Via dei Lecci 54', 'Via dei Platani 55', 'Via dei Tigli 56', 'Via dei Noci 57', 'Via delle Querce 58', 'Via dei Frassini 59', 'Via dei Salici 60',
            'Via degli Olmi 61', 'Via delle Betulle 62', 'Via delle Acacie 63', 'Via delle Rose 64', 'Via delle Camelie 65', 'Via delle Magnolie 66', 'Via delle Ginestre 67', 'Via dei Pini 68', 'Via degli Abeti 69', 'Via dei Castagni 70',
            'Via dei Larici 71', 'Via dei Lecci 72', 'Via dei Platani 73', 'Via dei Tigli 74', 'Via dei Noci 75', 'Via delle Querce 76', 'Via dei Frassini 77', 'Via dei Salici 78', 'Via degli Olmi 79', 'Via delle Betulle 80',
            'Via degli Abeti 81', 'Via dei Castagni 82', 'Via dei Larici 83', 'Via dei Lecci 84', 'Via dei Platani 85', 'Via dei Tigli 86', 'Via dei Noci 87', 'Via delle Querce 88', 'Via dei Frassini 89', 'Via dei Salici 90',
            'Via degli Olmi 91', 'Via delle Betulle 92', 'Via delle Acacie 93', 'Via delle Rose 94', 'Via delle Camelie 95', 'Via delle Magnolie 96', 'Via delle Ginestre 97', 'Via dei Pini 98', 'Via degli Abeti 99', 'Via dei Castagni 100'
        ];

        $numeri_di_telefono = [
            '320 123 4567', '328 987 6543', '339 567 8901', '349 123 9876', '327 654 3210', '331 678 1234', '345 876 5432', '348 432 1098', '338 219 8765', '329 765 4321',
            '347 987 6543', '335 678 1234', '334 765 8901', '330 432 1098', '342 123 4567', '346 789 4321', '341 654 7890', '332 876 1234', '343 987 6543', '344 432 1098',
            '349 321 8765', '325 876 5432', '326 567 8901', '327 219 6543', '328 765 3210', '329 654 1234', '330 987 5432', '331 789 4321', '332 123 5678', '333 654 9876',
            '334 321 8765', '335 876 1234', '336 765 4321', '337 567 8901', '338 432 1098', '339 219 8765', '340 987 6543', '341 123 4567', '342 876 5432', '343 765 4321',
            '344 567 8901', '345 432 1098', '346 219 8765', '347 987 6543', '348 123 4567', '349 876 5432', '350 654 3210', '351 567 8901', '352 432 1098', '353 219 8765',
            '354 987 6543', '355 123 4567', '356 876 5432', '357 765 4321', '358 567 8901', '359 432 1098', '360 219 8765', '361 987 6543', '362 123 4567', '363 876 5432',
            '364 765 4321', '365 567 8901', '366 432 1098', '367 219 8765', '368 987 6543', '369 123 4567', '370 876 5432', '371 765 4321', '372 567 8901', '373 432 1098',
            '374 219 8765', '375 987 6543', '376 123 4567', '377 876 5432', '378 765 4321', '379 567 8901', '380 432 1098', '381 219 8765', '382 987 6543', '383 123 4567',
            '384 876 5432', '385 765 4321', '386 567 8901', '387 432 1098', '388 219 8765', '389 987 6543', '390 123 4567', '391 876 5432', '392 765 4321', '393 567 8901',
            '394 432 1098', '395 219 8765', '396 987 6543', '397 123 4567', '398 876 5432', '399 765 4321'
        ];

        $emails = [
            '@example.com',
            '@info.com',
            '@contact.com',
            '@support.com',
            '@admin.com',
            '@sales.com',
            '@service.com',
            '@hello.com',
            '@mail.com',
            '@office.com'
        ];


        $orders = [];

        // Funzione per generare gli ordini random
        function generateRandomOrder($restaurantId, $dishes, $indirizzi, $numeri_di_telefono)
        {
            $selectedDishes = [];
            for ($i = 0; $i < rand(1, 7); $i++) {
                $selectedDishes[] = $dishes[array_rand($dishes)];
            }

            return [
                'restaurant_id' => $restaurantId,
                'dishes' => $selectedDishes,
                'status' => (bool)rand(0, 1),
                'address' => $indirizzi[array_rand($indirizzi)],
                'phone' => '+39' . ' ' . $numeri_di_telefono[array_rand($numeri_di_telefono)],
            ];
        }

        // 
        foreach ($restaurants as $restaurantId) {
            for ($i = 0; $i < rand(3, 5); $i++) {
                $orders[] = generateRandomOrder($restaurantId, $dishes, $indirizzi, $numeri_di_telefono);
            }
        }

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->restaurant_id = $order['restaurant_id'];
            $new_order->status = $order['status'];
            $new_order->name = $faker->firstName();
            $new_order->lastname = $faker->lastName();
            $new_order->email = strtolower($new_order->name . '.' . $new_order->lastname . $emails[rand(0, 9)]);
            $new_order->address = $order['address'];
            $new_order->phone = $order['phone'];
            $new_order->total = 0;
            $new_order->save();

            // Calcola il totale dell'ordine
            $total = 0;
            for ($i = 0; $i <= 1; $i++) {
                $dish_order = new DishOrder();
                $dish_order->order_id = $new_order->id;
                $dish_order->dish_id = rand(1, 243);
                $dish_order->price = Dish::find($dish_order->dish_id)->price;
                $dish_order->quantity = count($order['dishes']);
                $dish_order->total_price = $dish_order->price * $dish_order->quantity;
                $dish_order->save();

                // Calcola il costo totale del piatto nell'ordine
                $total += $dish_order->price * $dish_order->quantity;
            }

            $new_order->total = $total;
            $new_order->save();
        }
    }
}
