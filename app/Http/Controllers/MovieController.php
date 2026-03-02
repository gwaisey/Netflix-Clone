<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // Menghubungkan ke database

class MovieController extends Controller
{
    /**
     * Menampilkan semua daftar film (Halaman Utama)
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Menampilkan form untuk tambah film baru
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Menyimpan data film baru ke database (Logic dari dosenmu)
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validateData = $request->validate([
            'title'       => 'required|min:3|max:100',
            'genre'       => 'required',
            'poster_url'  => 'required|url',
            'description' => 'required|min:10',
        ]);

        // Proses input ke database
        $movie = new Movie();
        $movie->title       = $validateData['title'];
        $movie->genre       = $validateData['genre'];
        $movie->poster_url  = $validateData['poster_url'];
        $movie->description = $validateData['description'];
        $movie->save();

        return redirect('/movies')->with('success', "Movie '{$movie->title}' added successfully!");
    }

    /**
     * Menampilkan form edit film
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    /**
     * Memperbarui data film yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title'       => 'required|min:3|max:100',
            'genre'       => 'required',
            'poster_url'  => 'required|url',
            'description' => 'required|min:10',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($validateData);

        return redirect('/movies')->with('success', "Movie '{$movie->title}' updated successfully!");
    }

    /**
     * Menghapus film dari database
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect('/movies')->with('success', "Movie '{$movie->title}' has been deleted.");
    }

    public function show($id)
    {
        // Mengambil 1 data film berdasarkan ID yang diklik
        $movie = Movie::findOrFail($id); 
        return view('movies.show', compact('movie'));
    }
    
    public function __construct()
    {
        // Hanya index dan show yang bisa dilihat tanpa login
        $this->middleware('auth')->except(['index', 'show']);
    }
}