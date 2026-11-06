<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'text' => Str::random(100),
            'likes' => random_int(1, 10000),
        ]);
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'text' => Str::random(100),
            'likes' => random_int(1, 10000),
        ]);
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'text' => Str::random(100),
            'likes' => random_int(1, 10000),
        ]);
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'text' => Str::random(100),
            'likes' => random_int(1, 10000),
        ]);
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'slug' => Str::random(10),
            'text' => Str::random(100),
            'likes' => random_int(1, 10000),
        ]);
    }
}
