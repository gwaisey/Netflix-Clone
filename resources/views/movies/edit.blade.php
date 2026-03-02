<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Netflix Admin - Edit Movie</title>
<style>
        body { 
            background-color: #141414; 
            color: white; 
            font-family: 'Roboto', sans-serif; 
        }
        .card { background-color: #222; border: none; color: white; }
        .btn-netflix { background-color: #e50914; color: white; border: none; }
        .btn-netflix:hover { background-color: #b20710; color: white; }
        
        /* Konsistensi gaya input dengan create.blade.php */
        .form-control, .form-select { 
            background-color: #333; 
            border: 1px solid #444; 
            color: white; 
        }
        .form-control:focus, .form-select:focus { 
            background-color: #444; 
            color: white; 
            border-color: #e50914; 
            box-shadow: none; 
        }
        label { font-weight: 400; color: #aaa; }
    </style>
</head>
<body>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 card p-4 shadow">
            <h1 class="text-center" style="color: #e50914;">Edit Movie</h1>
            <hr>
            
            <form action="{{ url('/movies/'.$movie->id) }}" method="POST">
                @method('PATCH') @csrf
                
                <div class="mb-3">
                    <label class="form-label">Movie Title</label>
                    <input type="text" class="form-control bg-dark text-white border-secondary" name="title" value="{{ $movie->title }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select class="form-select bg-dark text-white border-secondary" name="genre">
                        <option value="Action" {{ $movie->genre == 'Action' ? 'selected' : '' }}>Action</option>
                        <option value="Horror" {{ $movie->genre == 'Horror' ? 'selected' : '' }}>Horror</option>
                        <option value="Drama" {{ $movie->genre == 'Drama' ? 'selected' : '' }}>Drama</option>
                        <option value="Sci-Fi" {{ $movie->genre == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                        <option value="Comedy" {{ $movie->genre == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">URL Poster</label>
                    <input type="text" class="form-control bg-dark text-white border-secondary" name="poster_url" value="{{ $movie->poster_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Synopsis</label>
                    <textarea class="form-control bg-dark text-white border-secondary" rows="3" name="description">{{ $movie->description }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-netflix flex-grow-1">Update Movie</button>
                    <a href="{{ url('/movies') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>