<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Selene',
            'email' => 'selene_alarconcanamero@iescarlesvallbona.cat',
            'password' => Hash::make('planahead'),
            'administrator' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Mama',
            'email' => 'mama_kontesylla@iescarlesvallbona.cat',
            'password' => Hash::make('planahead'),
            'administrator' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Francesc',
            'email' => 'francesc@gmail.com',
            'password' => Hash::make('planahead'),
            'administrator' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Alfredo',
            'email' => 'alfredo@gmail.com',
            'password' => Hash::make('planahead'),
            'administrator' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Jordi',
            'email' => 'jordi@gmail.com',
            'password' => Hash::make('planahead'),
            'administrator' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Valera',
            'email' => 'valera@gmail.com',
            'password' => Hash::make('planahead'),
            'administrator' => 1,
        ]);
    }
}
