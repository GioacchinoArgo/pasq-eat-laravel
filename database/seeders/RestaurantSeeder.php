<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Faker\Generator;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $restaurants = [

            // Ristoranti Italiani
            [
                'categories' => [1, 14],
                'restaurant_name' => 'Rifugio Romano',
                'address' => 'Via Volturno 39/41',
                'image' => 'restaurant_images/rifugio-romano.jpg'
            ],
            [
                'categories' => [1, 11],
                'restaurant_name' => 'Pasta Urbana',
                'address' => 'Via Urbana, 126',
                'image' => 'restaurant_images/pasta-urbana.jpg'
            ],
            [
                'categories' => [1],
                'restaurant_name' => 'Foodie GreenLab',
                'address' => 'Viale dei Quattro Venti, 150/c',
                'image' => 'restaurant_images/foodie-greenlab.jpeg'
            ],
            [
                'categories' => [1],
                'restaurant_name' => 'Tonnarello',
                'address' => 'Via del Governo Vecchio, 86',
                'image' => 'restaurant_images/tonnarello.jpg'
            ],
            [
                'categories' => [1, 13],
                'restaurant_name' => 'Gelateria Bartocci',
                'address' => 'Via Alessandria, 145',
                'image' => 'restaurant_images/gelateria-bartocci.jpg'
            ],
            [
                'categories' => [1, 11],
                'restaurant_name' => 'Nonna Agrippina',
                'address' => 'Vicolo del Cinque, 15',
                'image' => 'restaurant_images/nonna-agrippina.jpg'
            ],
            [
                'categories' => [1, 13],
                'restaurant_name' => 'Gelateria Giolitti',
                'address' => 'Via degli Uffici del Vicario, 40',
                'image' => 'restaurant_images/gelateria-giolitti.png'
            ],
            [
                'categories' => [1, 12],
                'restaurant_name' => 'Il Pellicano',
                'address' => 'Via Ugo De Carolis, 26',
                'image' => 'restaurant_images/il-pellicano.jpeg'
            ],
            [
                'categories' => [1, 14],
                'restaurant_name' => 'Tavola Rotonda',
                'address' => 'Via Pippo De Ciccio, 116',
                'image' => 'restaurant_images/tavola-rotonda.png'
            ],

            //Ristoranti Giapponesi e Cinesi
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'Panda Express',
                'address' => 'Viale Regina Margherita, 242',
                'image' => 'restaurant_images/panda-express.jpg'
            ],
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'Your Sushi',
                'address' => 'Via dei Magazzini Generali, 2C',
                'image' => 'restaurant_images/your-sushi.png'
            ],
            [
                'categories' => [2, 12],
                'restaurant_name' => 'Panda Market',
                'address' => 'Via della Meloria, 13',
                'image' => 'restaurant_images/panda-market.jpeg'
            ],
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'Ciao Zì',
                'address' => 'Via di Santa Maria Ausiliatrice, 16',
                'image' => 'restaurant_images/ciao-zi.png'
            ],
            [
                'categories' => [3],
                'restaurant_name' => 'Zen Sushi',
                'address' => 'Via degli scipioni, 243',
                'image' => 'restaurant_images/zen-sushi.jpg'
            ],
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'Zenzero Fleming',
                'address' => 'Via Flaminia L, 573',
                'image' => 'restaurant_images/zenzero-fleming.jpeg'
            ],
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'New Town',
                'address' => 'Via della Meloria, 15',
                'image' => 'restaurant_images/new-town.jpeg'
            ],
            [
                'categories' => [2, 3, 15],
                'restaurant_name' => 'Crudo Pokè',
                'address' => 'Via Salaria, 17',
                'image' => 'restaurant_images/crudo-poke.jpg'
            ],
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'Temakinho',
                'address' => 'Via dei Serpenti, 16',
                'image' => 'restaurant_images/temakinho.jpg'
            ],
            [
                'categories' => [2, 3, 12],
                'restaurant_name' => 'Ravioleria Baozi',
                'address' => 'Via Giovan Battista Gandino, 44',
                'image' => 'restaurant_images/ravioleria-baozi.jpg'
            ],

            // Ristoranti Indiani
            [
                'categories' => [4, 11],
                'restaurant_name' => 'Saravanaa Bhavan',
                'address' => 'Via Volturno, 1',
                'image' => 'restaurant_images/saravanaa-bhavan.jpg'
            ],
            [
                'categories' => [4, 11],
                'restaurant_name' => 'Himalaya\'s Kashmir',
                'address' => 'Via Principe Amedeo 325',
                'image' => 'restaurant_images/himalayas-kashmir.jpg'
            ],
            [
                'categories' => [4, 11],
                'restaurant_name' => 'Tiger Tandoori',
                'address' => 'Via l\'Aquila, 50',
                'image' => 'restaurant_images/tiger-tandoori.jpeg'
            ],
            [
                'categories' => [4, 11],
                'restaurant_name' => 'New Delhi',
                'address' => 'Via Milazzo, 25/25a',
                'image' => 'restaurant_images/new-delhi.png'
            ],
            [
                'categories' => [4, 11],
                'restaurant_name' => 'Samoseria',
                'address' => 'Via dei Prati dei Papa, 16',
                'image' => 'restaurant_images/samoseria.png'
            ],

            // Ristoranti Messicani
            [
                'categories' => [5, 11],
                'restaurant_name' => 'Billy Tacos',
                'address' => 'Piazza Ippolito Nievo, 33',
                'image' => 'restaurant_images/billy-tacos.jpg'
            ],
            [
                'categories' => [5, 11],
                'restaurant_name' => 'Taco Libre',
                'address' => 'Via Tacito, 14',
                'image' => 'restaurant_images/taco-libre.png'
            ],
            [
                'categories' => [5],
                'restaurant_name' => 'The Mexican',
                'address' => 'Via Cappadocia 26, Roma',
                'image' => 'restaurant_images/the-mexican.jpeg'
            ],
            [
                'categories' => [5, 11],
                'restaurant_name' => 'Casa Quesadillas',
                'address' => 'Via Carlo Sereni, 14',
                'image' => 'restaurant_images/casa-quesadillas.png'
            ],
            [
                'categories' => [5],
                'restaurant_name' => 'Tacos King',
                'address' => 'Via degli Equi, 56',
                'image' => 'restaurant_images/tacos-king.jpg'
            ],

            // Ristoranti Siriani
            [
                'categories' => [6],
                'restaurant_name' => 'Shawarma Express',
                'address' => 'Vicolo del Gallo, 11',
                'image' => 'restaurant_images/shawarma-express.jpeg'
            ],
            [
                'categories' => [6, 11],
                'restaurant_name' => 'Damas Kebab',
                'address' => 'Viale Guglielmo Marconi, 415',
                'image' => 'restaurant_images/damas-kebab.png'
            ],

            // Ristoranti Africani
            [
                'categories' => [7, 11],
                'restaurant_name' => 'Blackalicious Afrofood',
                'address' => 'Via Giovanni De Calvi, box 19',
                'image' => 'restaurant_images/blackalicious-afrofood.png'
            ],
            [
                'categories' => [7],
                'restaurant_name' => 'Afrik Cavour',
                'address' => 'Via Cavour, 254',
                'image' => 'restaurant_images/afrik-cavour.jpg'
            ],

            // Ristoranti Thailandesi
            [
                'categories' => [8, 12],
                'restaurant_name' => 'Isola Puket',
                'address' => 'Via di Villa Chigi, 91',
                'image' => 'restaurant_images/isola-puket.jpg'
            ],
            [
                'categories' => [8, 11],
                'restaurant_name' => 'Bussarakham',
                'address' => 'Via Emanuele Filiberto, 251',
                'image' => 'restaurant_images/bussarakham.jpg'
            ],
            [
                'categories' => [8],
                'restaurant_name' => 'Bin Hai',
                'address' => 'Via la Spezia 86',
                'image' => 'restaurant_images/bin-hai.jpeg'
            ],
            [
                'categories' => [8],
                'restaurant_name' => 'Siam Cuisine',
                'address' => 'Via Toscana, 34',
                'image' => 'restaurant_images/siam-cuisine.jpeg'
            ],
            [
                'categories' => [8],
                'restaurant_name' => 'Thai Inn',
                'address' => 'Via Brittania, 5',
                'image' => 'restaurant_images/thai-inn.png'
            ],

            // Ristoranti Brasiliani
            [
                'categories' => [9, 11],
                'restaurant_name' => 'Brazilian Food',
                'address' => 'Via Tuscolana, 231/A',
                'image' => 'restaurant_images/brazilian-food.jpg'
            ],
            [
                'categories' => [9],
                'restaurant_name' => 'Manioka',
                'address' => 'Viale Aventino, 40',
                'image' => 'restaurant_images/manioka.jpg'
            ],

            // Ristoranti Turchi
            [
                'categories' => [10],
                'restaurant_name' => 'Turkish Kebap',
                'address' => 'Via Cipro, 79',
                'image' => 'restaurant_images/turkish-kebap.jpg'
            ],
            [
                'categories' => [10, 11],
                'restaurant_name' => 'Furious Kebab',
                'address' => 'Via di Acqua Bullicante, 43',
                'image' => 'restaurant_images/furious-kebab.jpeg'
            ],
        ];

        foreach ($restaurants as $key => $restaurant) {

            // Nuovo numero telefonico
            $phone_number = $faker->randomNumber(9, true);
            $new_phone = '+39 3' . $phone_number;

            // Nuova partitva IVA
            $random_number = $faker->randomNumber(2, true);
            $vat_number = $faker->randomNumber(9, true);
            $new_vat =  'IT' . $random_number . $vat_number;

            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $key + 1;

            if ($restaurant['image'] === '') {
                $new_restaurant->image = 'restaurant_images/default-restaurant.jpg';
            } else {
                $new_restaurant->image = $restaurant['image'];
            }

            $new_restaurant->vat = $new_vat;
            $new_restaurant->phone =  $new_phone;
            $new_restaurant->cap = '00187';
            $new_restaurant->city = 'Roma';
            $new_restaurant->slug = Str::slug($restaurant['restaurant_name']);
            $new_restaurant->restaurant_name = $restaurant['restaurant_name'];
            $new_restaurant->address = $restaurant['address'];



            $new_restaurant->save();
            $new_restaurant->categories()->attach($restaurant['categories']);
        }
    }
}
