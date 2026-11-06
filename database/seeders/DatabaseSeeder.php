<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Можно использовать как фиктивные данные через random, так и написанные собственноручно
        // Команда удаления и повторной отправки всей базы данных, вместе с наполнителями
        // php artisan migrate:fresh --seed


        // Общий вызов каждого из наполнителей через $this->call
        $this->call([
            PostSeeder::class,
            ProductSeeder::class,
            ClientSeeder::class,
            OrderSeeder::class,
            OrderlistSeeder::class,
            UserSeeder::class,
        ]);





        /*
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
