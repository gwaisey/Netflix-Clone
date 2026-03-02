<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #141414; color: white; font-family: 'Roboto', sans-serif; }
        .login-card { background-color: rgba(0,0,0,0.75); padding: 60px; border-radius: 4px; width: 450px; }
        .btn-netflix { background-color: #e50914; color: white; font-weight: bold; width: 100%; padding: 12px; }
        .form-control { background-color: #333; border: none; color: white; padding: 12px; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="login-card">
        <h1 class="mb-4 fw-bold">{{ __('msg.login_title') }}</h1>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-secondary small">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-netflix mt-2">Sign In</button>
        </form>
    </div>
</body>
</html>