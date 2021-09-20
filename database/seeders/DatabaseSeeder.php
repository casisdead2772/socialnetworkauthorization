<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'alexandr lykashenko',
            'email' => 'alexandrlykashenko.@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'vkontakte',
            'status' => 'Active'

        ]);

        DB::table('users')->insert([
            'name' => 'maxim alexandrov',
            'email' => 'maxim.alexandrov.@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'facebook',
            'status' => 'Active'
        ]);

        DB::table('users')->insert([
            'name' => 'Petr Ivanov',
            'email' => 'petr.ivanov.@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'facebook',
            'status' => 'Active'
        ]);

        DB::table('users')->insert([
            'name' => 'Mihail Sidorov',
            'email' => 'mihail.sidorov.@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'vkontakte',
            'status' => 'Active'
        ]);

        DB::table('users')->insert([
            'name' => 'John Smith',
            'email' => 'johnsmith@mail.ru',
            'password' => Hash::make('password'),
            'type' => 'vkontakte',
            'status' => 'Active'
        ]);
    }
}
