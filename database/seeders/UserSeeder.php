<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10),
            'age' => random_int(1, 100),
            'salary' => random_int(9000, 52000),
        ]);
    }
}
