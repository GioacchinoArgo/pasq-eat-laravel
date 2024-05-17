<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'label' => 'Italiano',
                'img' => 'category_images/spaghetti.png',
            ],
            [
                'label' => 'Cinese',
                'img' => 'category_images/dumpling.png',
            ],
            [
                'label' => 'Giapponese',
                'img' => 'category_images/sushi.png',
            ],
            [
                'label' => 'Indiano',
                'img' => 'category_images/chili.png',
            ],
            [
                'label' => 'Messicano',
                'img' => 'category_images/taco.png',
            ],
            [
                'label' => 'Siriano',
                'img' => 'category_images/kebab.png',
            ],
            [
                'label' => 'Africano',
                'img' => 'category_images/couscous.png',
            ],
            [
                'label' => 'Thailandese',
                'img' => 'category_images/ramen.png',
            ],
            [
                'label' => 'Brasiliano',
                'img' => 'category_images/feijoada.png',
            ],
            [
                'label' => 'Turco',
                'img' => 'category_images/doner-kebab.png',
            ],
            [
                'label' => 'Carne',
                'img' => 'category_images/meat.png',
            ],
            [
                'label' => 'Pesce',
                'img' => 'category_images/fish.png',
            ],
            [
                'label' => 'Gelato',
                'img' => 'category_images/ice-cream-cone.png',
            ],
            [
                'label' => 'Pizza',
                'img' => 'category_images/pizza.png',
            ],
            [
                'label' => 'Poke',
                'img' => 'category_images/poke-bowl.png',
            ],
        ];
        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->label = $category['label'];
            $new_category->img = $category['img'];
            $new_category->slug = Str::slug($category['label']);
            $new_category->save();
        }
    }
}
