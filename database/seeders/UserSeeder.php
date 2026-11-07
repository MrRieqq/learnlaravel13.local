<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        // Случайный элемент массива в сидере
        // Создадим массив допустимых значений и возьмем случайный
        // элемент через array_rand
        $zones = [ '.ru', '.com', '.org' ];
        $zone = $zones[array_rand($zones)];
        // Цикл на создание 20 записей в базе данных
        for ($i = 0; $i < 20; $i++) {
            // Генерация рандомных данных с последующим вводов внутрь таблицы products
            DB::table('users')->insert([
                'name' => Str::random(10) . $zone, // добавляем
                // Конкатенация строк - добавляем в конец строки @gmail.com,
                // чтобы проходить валидацию/для правдоподобного внешнего вида
                'email' => Str::random(10) . '@gmail.com',
                'age' => random_int(1, 100),
                'salary' => random_int(9000, 52000),
                'password' => Hash::make('password'),
            ]);
        }

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
            'password' => ('password'),
        ]);
    }
}
