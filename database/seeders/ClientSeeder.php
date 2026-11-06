<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
           'surname' => Str::random(32),
           'name' => Str::random(32),
           'patronymic' => Str::random(32),
        ]);
        DB::table('clients')->insert([
            'surname' => Str::random(32),
            'name' => Str::random(32),
            'patronymic' => Str::random(32),
        ]);
        DB::table('clients')->insert([
            'surname' => Str::random(32),
            'name' => Str::random(32),
            'patronymic' => Str::random(32),
        ]);
        DB::table('clients')->insert([
            'surname' => Str::random(32),
            'name' => Str::random(32),
            'patronymic' => Str::random(32),
        ]);
        DB::table('clients')->insert([
            'surname' => Str::random(32),
            'name' => Str::random(32),
            'patronymic' => Str::random(32),
        ]);
    }
}
