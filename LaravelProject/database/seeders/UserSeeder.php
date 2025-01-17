<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'type' => User::ADMIN,
            'date_of_birth' => $faker->dateTimeBetween('-60 years', '-18 years'),
            'about_me' => 'i am the ceo of De kaasfabriek',
            'profile_picture' => 'profile_pictures/placeholderAdmin.jpg',
            'privacy_mode' => $faker->boolean(),
        ]);
    }
}
