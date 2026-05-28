<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GreenTour</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #15803d; --bg-color: #f8fafc; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: white; padding: 2.5rem; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); width: 100%; max-width: 400px; }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary); text-decoration: none; text-align: center; display: block; margin-bottom: 2rem; }
        .form-group { margin-bottom: 1.2rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: #475569; }
        input { width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 1rem; }
        input:focus { outline: none; border-color: var(--primary); }
        .btn { width: 100%; background: var(--primary); color: white; padding: 0.8rem; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: 0.2s; }
        .btn:hover { opacity: 0.9; }
        .text-center { text-align: center; margin-top: 1rem; }
        .text-center a { color: var(--primary); text-decoration: none; font-weight: 600; }
        .error { color: #e11d48; font-size: 0.85rem; margin-top: 0.3rem; display: block; }
    </style>
</head>
<body>
    <div class="card">
        <a href="/" class="logo"><i class="fa-solid fa-leaf"></i> GreenTour</a>
        <h2 style="text-align: center; margin-bottom: 1.5rem; font-size: 1.3rem;">Masuk ke Akun Anda</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="contoh@email.com">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn">Masuk <i class="fa-solid fa-arrow-right"></i></button>
        </form>
        
        <div class="text-center">
            <p style="color: #64748b;">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>
