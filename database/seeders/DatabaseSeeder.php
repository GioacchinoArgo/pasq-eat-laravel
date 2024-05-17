<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        // ]);

        $this->call([UserSeeder::class, CategorySeeder::class]);

        \App\Models\User::factory(36)->create();

        $this->call([RestaurantSeeder::class, DishSeeder::class]);
    }
}
