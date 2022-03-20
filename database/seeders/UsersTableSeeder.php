<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'desha',
            'email' => 'desha@gmail.com',
            'password' => bcrypt(123123123),
        ]);

        User::create([
            'name' => 'mostafa',
            'email' => 'mostafa@gmail.com',
            'password' => bcrypt(123123123),

        ]); User::create([
        'name' => 'Motaz',
        'email' => 'motaz@gmail.com',
        'password' => bcrypt(123123123),
    ]);

    }
}
