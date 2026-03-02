<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    // Di dalam DatabaseSeeder.php
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Grace',
            'email' => 'grace@binus.ac.id',
            'password' => bcrypt('password123'), // Jangan lupa bcrypt!
        ]);

        $this->call([ MovieSeeder::class ]);
    }
}
