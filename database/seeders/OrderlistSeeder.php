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
