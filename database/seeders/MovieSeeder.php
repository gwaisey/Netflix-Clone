<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie; // Pastikan Model Movie di-import

class MovieSeeder extends Seeder
{
    public function run()
    {
        // Data film
        Movie::create([
            'title' => 'Stranger Things',
            'genre' => 'Sci-Fi',
            'poster_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDNOu9SQ-oAP_d0zqqMr2gB8cr4EC3IBbG-w&s',
            'description' => 'When a young boy vanishes, a small town uncovers a mystery involving secret experiments and terrifying supernatural forces.'
        ]);

    }
}