<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $restaurants = Restaurant::pluck('id');

        $nomi = [
            "Alessandro", "Giulia", "Francesco", "Lorenzo", "Martina", "Andrea", "Federica", "Matteo", "Chiara", "Simone",
            "Valentina", "Giorgio", "Elena", "Luca", "Sara", "Marco", "Alice", "Davide", "Giovanna", "Claudio",
            "Stefania", "Giovanni", "Paola", "Antonio", "Alessia", "Roberto", "Silvia", "Fabio", "Laura", "Enrico",
            "Ilaria", "Carlo", "Francesca", "Giuseppe", "Michela", "Massimo", "Anna", "Stefano", "Elisabetta", "Vincenzo",
            "Sofia", "Emanuele", "Marta", "Pietro", "Veronica", "Gabriele", "Rita", "Riccardo", "Bianca", "Daniele",
            "Gianluca", "Serena", "Cristiano", "Caterina", "Filippo", "Aurora", "Mario", "Annalisa", "Tommaso", "Eleonora",
            "Paolo", "Vanessa", "Vittorio", "Irene", "Alberto", "Edoardo", "Manuela", "Giacomo", "Antonella", "Dario",
            "Beatrice", "Raffaele", "Marina", "Leonardo", "Gabriella", "Gianni", "Federico", "Claudia", "Gianfranco", "Barbara",
            "Samuele", "Patrizia", "Diego", "Monica", "Alessio", "Daniela", "Mauro", "Lucia", "Sergio", "Nicoletta",
            "Cristina", "Raffaella", "Umberto", "Alessandra", "Nicola", "Giada", "Ruggero", "Giovanni", "Valeria", "Flavio"
        ];

        $cognomi = [
            "Rossi", "Ferrari", "Russo", "Bianchi", "Romano", "Colombo", "Ricci", "Marino", "Greco", "Bruno",
            "Gallo", "Conti", "De Luca", "Costa", "Giordano", "Mancini", "Rizzo", "Lombardi", "Moretti", "Barbieri",
            "Fontana", "Santoro", "Mariani", "Rinaldi", "Caruso", "Ferrara", "Gatti", "Bianco", "Martini", "Leone",
            "Longo", "Gentile", "Martinelli", "Vitale", "Lombardo", "Serra", "Coppola", "De Santis", "D'Angelo", "Marchetti",
            "Parisi", "Villa", "Conte", "Ferraro", "Ferri", "Fabbri", "Bianc", "Farinelli", "Pagani", "Palumbo",
            "Silvestri", "Sanna", "Rossetti", "Montanari", "Grassi", "Orlando", "Neri", "Barone", "Massaro", "Amato",
            "Guerra", "Benvenuti", "Sorrentino", "Sartori", "Damiani", "Monti", "Palumbo", "Piras", "Negri", "Ferri",
            "Bruno", "Valente", "Amendola", "Messina", "Marra", "D'Amico", "Cattaneo", "Farina", "Costa", "Parisi",
            "Caputo", "Mazza", "Riva", "Moretti", "Galli", "Mariani", "Neri", "Orlando", "Rizzi", "Lombardi",
            "Giuliani", "Pagano", "Ferrari", "Montanari", "Martino", "Sanna", "Villa", "Esposito", "Pellegrini", "Caruso"
        ];

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

        foreach ($restaurants as $restaurant) {

            $index = [
                [rand(1, 244)],
                [rand(1, 244), rand(1, 244)],
                [rand(1, 244), rand(1, 244), rand(1, 244)],
                [rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244)],
                [rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244)],
                [rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244)],
                [rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244), rand(1, 244), rand(0, 244)],
            ];

            $order1name = $nomi[rand(0, 99)];
            $order2name = $nomi[rand(0, 99)];
            $order3name = $nomi[rand(0, 99)];

            $order1lastname = $cognomi[rand(0, 99)];
            $order2lastname = $cognomi[rand(0, 99)];
            $order3lastname = $cognomi[rand(0, 99)];

            $indirizzo1 = $indirizzi[rand(0, 99)];
            $indirizzo2 = $indirizzi[rand(0, 99)];
            $indirizzo3 = $indirizzi[rand(0, 99)];

            $orders[] = [
                'restaurant_id' => $restaurant,
                'dishes' => $index[rand(0, 6)],
                'total' => rand(20, 50) + (rand(0, 99) / 100),
                'status' => (bool)rand(0, 1),
                'name' => $order1name,
                'lastname' => $order1lastname,
                'email' => strtolower($order1name) . strtolower($order1lastname) . $emails[rand(0, 9)],
                'address' => $indirizzo1,
                'phone' => $numeri_di_telefono[rand(0, 95)],
            ];
            $orders[] = [
                'restaurant_id' => $restaurant,
                'dishes' => $index[rand(0, 6)],
                'total' => rand(20, 50) + (rand(0, 99) / 100),
                'status' => (bool)rand(0, 1),
                'name' => $order2name,
                'lastname' => $order2lastname,
                'email' => strtolower($order2name) . strtolower($order2lastname) . $emails[rand(0, 9)],
                'address' => $indirizzo2,
                'phone' => '+39' . $numeri_di_telefono[rand(0, 95)],
            ];
            $orders[] = [
                'restaurant_id' => $restaurant,
                'dishes' => $index[rand(0, 6)],
                'total' => rand(20, 50) + (rand(0, 99) / 100),
                'status' => (bool)rand(0, 1),
                'name' => $order3name,
                'lastname' => $order3lastname,
                'email' => strtolower($order3name) . strtolower($order3lastname) . $emails[rand(0, 9)],
                'address' => $indirizzo3,
                'phone' => $numeri_di_telefono[rand(0, 95)],
            ];
        }

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->restaurant_id = $order['restaurant_id'];
            $new_order->total = $order['total'];
            $new_order->status = $order['status'];
            $new_order->name = $order['name'];
            $new_order->lastname = $order['lastname'];
            $new_order->email = $order['email'];
            $new_order->address = $order['address'];
            $new_order->phone = $order['phone'];
            $new_order->save();
            $new_order->dishes()->attach($order['dishes']);
        }
    }
}
