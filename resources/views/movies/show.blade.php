<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>{{ $movie->title }} - Netflix</title>
    <style>
        body { 
            background-color: #141414; 
            color: white; 
            font-family: 'Roboto', sans-serif; 
        }
        .navbar { background-color: rgba(0,0,0,0.8); padding: 1rem 2rem; }
        .netflix-logo { color: #e50914; font-weight: bold; font-size: 28px; text-decoration: none; }
        
        .movie-header {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .poster-detail { 
            width: 100%; 
            border-radius: 8px; 
            box-shadow: 0 0 30px rgba(0,0,0,0.8);
            transition: transform 0.3s ease;
        }
        .poster-detail:hover { transform: scale(1.02); }
        
        .btn-play { 
            background-color: white; 
            color: black; 
            font-weight: bold; 
            border: none; 
            padding: 12px 35px;
            font-size: 1.2rem;
            border-radius: 4px;
        }
        .btn-play:hover { background-color: rgba(255,255,255,0.7); color: black; }
        
        .btn-info-custom {
            background-color: rgba(109, 109, 110, 0.7);
            color: white;
            font-weight: bold;
            padding: 12px 35px;
            font-size: 1.2rem;
            border-radius: 4px;
            border: none;
        }
        .btn-info-custom:hover { background-color: rgba(109, 109, 110, 0.4); color: white; }
        
        .genre-text { color: #46d369; font-weight: bold; font-size: 1.1rem; }
        .description-text { font-size: 1.1rem; line-height: 1.6; color: #e5e5e5; max-width: 800px; }
    </style>
</head>
<body>

<nav class="navbar d-flex justify-content-between align-items-center mb-0 shadow">
    <a class="netflix-logo" href="{{ url('/movies') }}">NETFLIX</a>
    <a href="{{ url('/movies') }}" class="text-white text-decoration-none fw-bold">← Back to Catalog</a>
</nav>

<div class="container movie-header">
    <div class="row align-items-center">
        <div class="col-md-4 mb-4 mb-md-0">
            <img src="{{ $movie->poster_url }}" class="poster-detail" alt="{{ $movie->title }}">
        </div>

        <div class="col-md-8 px-md-5">
            <h1 class="display-2 fw-bold mb-2">{{ $movie->title }}</h1>
            <p class="genre-text mb-4">98% Match <span class="text-secondary fw-normal ms-2">2026</span> <span class="badge border border-secondary text-secondary ms-2">13+</span></p>
            
            <div class="mb-4">
                <span class="text-white fw-bold">Genre:</span> 
                <span class="text-secondary ms-1">{{ $movie->genre }}</span>
            </div>

            <p class="description-text mb-5">
                {{ $movie->description }}
            </p>

            <div class="d-flex gap-3">
                <button class="btn btn-play d-flex align-items-center">
                    <span class="me-2">▶</span> Play
                </button>
                <a href="{{ url('/movies/'.$movie->id.'/edit') }}" class="btn btn-info-custom d-flex align-items-center">
                    <span class="me-2">ⓘ</span> Edit Movie
                </a>
            </div>
        </div>
    </div>
</div>

<footer class="text-center text-secondary py-5 mt-5">
    <small>&copy; 2026 Netflix Clone Project - CS BINUS</small>
</footer>

</body>
</html>