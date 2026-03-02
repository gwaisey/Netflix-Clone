<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Netflix Catalog - Home</title>
    <style>
        body { 
            background-color: #141414; 
            color: white; 
            font-family: 'Roboto', sans-serif; /* Prioritas Roboto sesuai permintaanmu */
        }
        .navbar { background-color: #000; padding: 1rem 2rem; }
        .netflix-logo { color: #e50914; font-weight: bold; font-size: 28px; text-decoration: none; }
        .netflix-logo:hover { color: #b20710; }
        
        /* Movie Card Styling */
        .movie-card {
            background-color: #181818;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .movie-card:hover {
            transform: scale(1.05);
            z-index: 2;
            box-shadow: 0 10px 20px rgba(0,0,0,0.6);
        }
        .card-img-top {
            height: 400px;
            object-fit: cover;
        }
        .genre-badge {
            background-color: rgba(255,255,255,0.1);
            color: #aaa;
            font-size: 0.8rem;
            padding: 4px 8px;
            border-radius: 4px;
        }
        .btn-netflix { background-color: #e50914; color: white; border: none; font-weight: bold; }
        .btn-netflix:hover { background-color: #b20710; color: white; }
    </style>
</head>
<body>

<nav class="navbar d-flex justify-content-between align-items-center mb-5">
    <a class="netflix-logo" href="{{ url('/movies') }}">NETFLIX</a>
    <a href="{{ url('/movies/create') }}" class="btn btn-netflix btn-sm fw-bold px-3">+ ADD MOVIE</a>
    
</nav>

<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success bg-success text-white border-0 mb-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <h3 class="mb-4">My Movie Catalog</h3>
    
    <div class="row">
        @forelse ($movies as $movie)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card movie-card h-100 shadow">
                    <a href="{{ url('/movies/'.$movie->id) }}">
                    <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title text-white mb-1">{{ $movie->title }}</h6>
                        <div class="mb-3">
                            <span class="genre-badge">{{ $movie->genre }}</span>
                        </div>
                        <p class="card-text text-secondary small">
                            {{ Str::limit($movie->description, 80) }}
                        </p>
                        
                        <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                            <a href="{{ url('/movies/'.$movie->id.'/edit') }}" class="btn btn-outline-light btn-sm px-3">Edit</a>
                            
                            <form action="{{ url('/movies/'.$movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger text-decoration-none small">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-secondary fs-5">Your catalog is empty. Start adding some blockbusters!</p>
                <a href="{{ url('/movies/create') }}" class="btn btn-outline-danger mt-2">Add First Movie</a>
            </div>
        @endforelse
    </div>
</div>

<footer class="text-center text-secondary py-5 mt-5">
    <small>&copy; 2025 Netflix Clone Project - Computer Science BINUS</small>
</footer>

</body>
</html>