<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Цикл на создание 20 записей в базе данных
        for ($i = 0; $i < 20; $i++) {
            // Генерация рандомных данных с последующим вводов внутрь таблицы products
            DB::table('orderlists')->insert([
                'amount' => random_int(10, 100), // Рандомное число от 10 до 100
                'price' => random_int(10, 1000),
                'order_id' => random_int(1, 5), // Создаем привязку по вторичному ключу, по уже
                // существующему элементу в таблице Order
                'product_id' => random_int(1, 5), // Создаем привязку по вторичному ключу, по уже
                // существующему элементу в таблице Product
            ]);
        }
        DB::table('orderlists')->insert([
            'amount' => random_int(10, 100), // Рандомное число от 10 до 100
            'price' => random_int(10, 1000),
            'order_id' => random_int(1, 5), // Создаем привязку по вторичному ключу, по уже
            // существующему элементу в таблице Order
            'product_id' => random_int(1, 5), // Создаем привязку по вторичному ключу, по уже
            // существующему элементу в таблице Product
        ]);
        DB::table('orderlists')->insert([
            'amount' => random_int(10, 100),
            'price' => random_int(10, 1000),
            'order_id' => random_int(1, 5),
            'product_id' => random_int(1, 5),
        ]);
        DB::table('orderlists')->insert([
            'amount' => random_int(10, 100),
            'price' => random_int(10, 1000),
            'order_id' => random_int(1, 5),
            'product_id' => random_int(1, 5),
        ]);
        DB::table('orderlists')->insert([
            'amount' => random_int(10, 100),
            'price' => random_int(10, 1000),
            'order_id' => random_int(1, 5),
            'product_id' => random_int(1, 5),
        ]);
    }
}
