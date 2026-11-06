<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Генерация рандомных данных с последующим вводов внутрь таблицы products
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(50),
            'price' => random_int(100, 1000)
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(50),
            'price' => random_int(100, 1000)
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(50),
            'price' => random_int(100, 1000)
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(50),
            'price' => random_int(100, 1000)
        ]);
        // Вставка конкретных данных, которые мы определили заранее
        DB::table('products')->insert([
            'name' => 'Колбаса',
            'description' => 'Колбаса высшего сорта',
            'price' => 100.32,
        ]);
    }
}
