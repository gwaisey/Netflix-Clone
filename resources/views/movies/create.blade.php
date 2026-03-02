<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Netflix Admin - Add Movie</title>
    <style>
        body { 
            background-color: #141414; 
            color: white; 
            font-family: 'Roboto', sans-serif; /* Menggunakan Roboto */
        }
        .card { background-color: #222; border: none; color: white; }
        .btn-netflix { background-color: #e50914; color: white; border: none; }
        .btn-netflix:hover { background-color: #b20710; color: white; }
        .form-control, .form-select { background-color: #333; border: 1px solid #444; color: white; }
        .form-control:focus, .form-select:focus { background-color: #444; color: white; border-color: #e50914; box-shadow: none; }
        
        /* Menghaluskan tampilan label dan judul */
        label { font-weight: 400; color: #aaa; }
        h1 { font-weight: 700; }
    </style>
</head>
<body>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 card p-4 shadow">
            <h1 class="text-center" style="color: #e50914;">Netflix</h1>
            <p class="text-center text-secondary">Add New Movie To Catalog</p>
            <hr>
            
            <form action="{{ url('/movies') }}" method="POST">
                @csrf 

                <div class="mb-3">
                    <label class="form-label">Movie Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           name="title" value="{{ old('title') }}">
                    @error('title') 
                        <div class="text-danger small mt-1">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select class="form-select @error('genre') is-invalid @enderror" name="genre">
                        <option value="Action" {{ old('genre') == 'Action' ? 'selected' : '' }}>Action</option>
                        <option value="Horror" {{ old('genre') == 'Horror' ? 'selected' : '' }}>Horror</option>
                        <option value="Drama" {{ old('genre') == 'Drama' ? 'selected' : '' }}>Drama</option>
                        <option value="Sci-Fi" {{ old('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                        <option value="Comedy" {{ old('genre') == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                    </select>
                    @error('genre') 
                        <div class="text-danger small mt-1">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Poster URL</label>
                    <input type="text" class="form-control @error('poster_url') is-invalid @enderror" 
                           name="poster_url" value="{{ old('poster_url') }}" placeholder="https://image-link.com/poster.jpg">
                    @error('poster_url') 
                        <div class="text-danger small mt-1">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Synopsis</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description') 
                        <div class="text-danger small mt-1">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">YouTube Trailer URL</label>
                    <input type="text" name="trailer_url" value="{{ $movie->trailer_url ?? '' }}" class="form-control">
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-netflix flex-grow-1 fw-bold">Add to Catalog</button>
                    <a href="{{ url('/movies') }}" class="btn btn-outline-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>