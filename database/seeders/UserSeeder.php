<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {

        $users = [
            [
                'name' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'Mario',
                'lastname' => 'Rossi',
                'email' => 'mario.rossi@example.com',
            ],
            [
                'name' => 'Luca',
                'lastname' => 'Bianchi',
                'email' => 'luca.bianchi@example.com',
            ],
            [
                'name' => 'Anna',
                'lastname' => 'Verdi',
                'email' => 'anna.verdi@example.com',
            ],
            [
                'name' => 'Sofia',
                'lastname' => 'Gialli',
                'email' => 'sofia.gialli@example.com',
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Neri',
                'email' => 'marco.neri@example.com',
            ]

        ];

        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->lastname = $user['lastname'];
            $new_user->email = $user['email'];
            $new_user->image = $faker->imageUrl(350, 350);
            $new_user->remember_token = Str::random(10);
            $new_user->password = Hash::make('password');
            $new_user->email_verified_at = now();
            $new_user->save();
        }
    }
}
