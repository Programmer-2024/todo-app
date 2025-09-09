<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 10 user
        for ($i = 1; $i <= 2; $i++) {
            $userId = DB::table('users')->insertGetId([
                'name' => "User $i",
                'email' => "user$i@gmail.com",
                'password' => Hash::make('1'), // default password
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Setiap user punya 5 todos
            for ($j = 1; $j <= 5; $j++) {
                DB::table('todos')->insert([
                    'user_id' => $userId,
                    'title' => "Todo $j for User $i",
                    'body' => "Ini adalah isi todo ke-$j milik User $i.",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
