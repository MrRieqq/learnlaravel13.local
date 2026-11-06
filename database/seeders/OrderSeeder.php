<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'date' => now(),
            'total' => random_int(10, 100),
            'client_id' => random_int(1, 5),
        ]);
        DB::table('orders')->insert([
            'date' => now(),
            'total' => random_int(10, 100),
            'client_id' => random_int(1, 5),
        ]);
        DB::table('orders')->insert([
            'date' => now(),
            'total' => random_int(10, 100),
            'client_id' => random_int(1, 5),
        ]);
        DB::table('orders')->insert([
            'date' => now(),
            'total' => random_int(10, 100),
            'client_id' => random_int(1, 5),
        ]);
        DB::table('orders')->insert([
            'date' => now(),
            'total' => random_int(10, 100),
            'client_id' => random_int(1, 5),
        ]);
    }
}
