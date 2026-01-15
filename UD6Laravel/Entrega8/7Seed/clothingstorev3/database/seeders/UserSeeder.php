<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {

        // Using model factories to create users, let´s create an admin user first 
        // This is useful for setting up an initial user with specific credentials
        User::factory()->create([
            'name' => 'maria',
            'email' => 'maria@fcorios.com',
        ]);

        // Using model factories to create 10 random users
        // This is useful for populating the database with sample data for testing or development purposes
        //You can find the User factory in database/factories/UserFactory.php
        //Laravel User factory brings by default.
        User::factory(20)->create();


        //Using DB facade to insert data directly
        // This is an alternative to using model factories
        // and allows for quick seeding of the database without needing to define a factory.
        // It is useful for simple seed data or when you want to quickly populate the database with
        // some initial data without the overhead of creating a factory.

        // seed the users table with 10 random users
        /* v1: Just an example of how to seed users with random data through DB facade*/
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'password' => Hash::make('password'),
            ]);
        }

    }
}   

