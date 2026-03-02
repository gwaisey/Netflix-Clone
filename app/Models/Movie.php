<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi (Mass Assignment)
    protected $fillable = ['title', 'genre', 'poster_url', 'description'];
}
