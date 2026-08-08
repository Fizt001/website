@php $theme = \App\Models\Setting::get('active_theme', 'aurora'); @endphp
<!DOCTYPE html>
<html lang="id" data-theme="{{ $theme }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Tinta Emas Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@700;800;900&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/theme-{{ $theme }}.css">
    <style>
        body { display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 1.5rem; position: relative; overflow: hidden; }
        .login-bg { position: fixed; inset: 0; z-index: 0; background: var(--bg-primary); }
        .login-bg::before {
            content: ''; position: absolute; inset: 0;
            background: radial-gradient(ellipse 80% 60% at 50% -10%, var(--accent-glow, rgba(0,229,255,0.15)), transparent 70%);
        }
        .login-wrap { position: relative; z-index: 1; width: 100%; max-width: 420px; }
        .login-card { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 24px; padding: 2.5rem; backdrop-filter: blur(20px); }
        .login-logo { width: 56px; height: 56px; border-radius: 14px; background: var(--btn-primary); display: flex; align-items: center; justify-content: center; font-family: var(--font-heading); font-weight: 900; font-size: 1.4rem; color: white; margin: 0 auto 1.5rem; }
        .login-title { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800; color: var(--text-primary); text-align: center; margin-bottom: 0.35rem; }
        .login-sub { text-align: center; font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 2rem; }
        .back-link { display: flex; align-items: center; justify-content: center; gap: 0.4rem; margin-top: 1.5rem; color: var(--text-secondary); font-size: 0.85rem; text-decoration: none; transition: color 0.2s; }
        .back-link:hover { color: var(--accent); }
    </style>
</head>
<body>
<div class="login-bg"></div>

<div class="login-wrap">
    <div class="login-card">
        <div class="login-logo">TE</div>
        <div class="login-title">Admin Login</div>
        <div class="login-sub">Masuk ke panel admin Tinta Emas Indonesia</div>

        @if(session('status'))
        <div class="alert alert-success" style="margin-bottom:1.25rem;">{{ session('status') }}</div>
        @endif

        @if($errors->any())
        <div class="alert alert-error" style="margin-bottom:1.25rem;"><i class="ri-error-warning-fill"></i> {{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email"><i class="ri-mail-line"></i> Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@tintaemas.sch.id" required autofocus autocomplete="username">
            </div>
            <div class="form-group">
                <label class="form-label" for="password"><i class="ri-lock-line"></i> Password</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="••••••••••" required autocomplete="current-password">
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;">
                <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.85rem;color:var(--text-secondary);cursor:pointer;">
                    <input type="checkbox" name="remember" style="accent-color:var(--accent);"> Ingat saya
                </label>
                @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size:0.82rem;color:var(--accent);text-decoration:none;">Lupa password?</a>
                @endif
            </div>
            <button type="submit" class="btn-primary" style="width:100%;justify-content:center;font-size:1rem;padding:0.875rem;">
                <i class="ri-login-box-line"></i> Masuk ke Panel Admin
            </button>
        </form>
    </div>
    <a href="{{ route('home') }}" class="back-link">
        <i class="ri-arrow-left-line"></i> Kembali ke Website
    </a>
</div>
</body>
</html>
