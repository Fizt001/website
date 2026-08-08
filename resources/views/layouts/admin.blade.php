<!DOCTYPE html>
<html lang="id" data-theme="{{ $theme ?? 'aurora' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel — Tinta Emas Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/theme-{{ $theme ?? 'aurora' }}.css" id="theme-stylesheet">
    <style>
        .admin-layout { display: flex; min-height: 100vh; padding-top: 72px; }
        .admin-sidebar {
            width: 260px; flex-shrink: 0;
            background: var(--card-bg); border-right: 1px solid var(--card-border);
            position: fixed; top: 72px; left: 0; bottom: 0; overflow-y: auto;
            padding: 1.5rem 1rem;
        }
        .admin-main { margin-left: 260px; flex: 1; padding: 2.5rem; }
        .sidebar-label { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-secondary); padding: 0 0.75rem; margin: 1.5rem 0 0.5rem; }
        .sidebar-link {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.65rem 0.75rem; border-radius: 10px;
            color: var(--text-secondary); text-decoration: none; font-size: 0.9rem; font-weight: 500;
            transition: all 0.2s; margin-bottom: 2px;
        }
        .sidebar-link:hover, .sidebar-link.active { background: var(--tag-bg); color: var(--accent); }
        .sidebar-link i { font-size: 1.1rem; }
        .admin-page-title { font-family: var(--font-heading); font-size: 1.75rem; font-weight: 800; color: var(--text-primary); margin-bottom: 0.5rem; }
        .admin-page-sub { color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 2rem; }
        .admin-card { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: var(--card-radius); padding: 1.75rem; margin-bottom: 1.5rem; }
        .admin-card-title { font-weight: 700; color: var(--text-primary); margin-bottom: 1.25rem; font-size: 1rem; display: flex; align-items: center; gap: 0.5rem; }
        .stat-mini { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 12px; padding: 1.25rem 1.5rem; display: flex; align-items: center; gap: 1rem; }
        .stat-mini-icon { width: 44px; height: 44px; border-radius: 10px; background: var(--btn-primary); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; color: white; flex-shrink: 0; }
        .stat-mini-num { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800; color: var(--text-primary); line-height: 1; }
        .stat-mini-label { font-size: 0.8rem; color: var(--text-secondary); margin-top: 0.2rem; }
        .btn-sm { padding: 0.45rem 1rem; font-size: 0.85rem; border-radius: 8px; font-weight: 600; }
        @media (max-width: 768px) { .admin-sidebar { display: none; } .admin-main { margin-left: 0; padding: 1.25rem; } }
    </style>
</head>
<body>

{{-- NAVBAR ADMIN --}}
<nav class="navbar" id="navbar">
    <a href="{{ route('home') }}" class="navbar-brand">
        <div style="width:44px;height:44px;border-radius:10px;background:var(--btn-primary);display:flex;align-items:center;justify-content:center;font-weight:900;font-size:1.1rem;color:white;font-family:var(--font-heading);">TE</div>
        <div class="navbar-name">Admin Panel<span>Tinta Emas Indonesia</span></div>
    </a>
    <div style="display:flex;align-items:center;gap:1rem;">
        <a href="{{ route('home') }}" target="_blank" style="color:var(--text-secondary);font-size:0.875rem;text-decoration:none;display:flex;align-items:center;gap:0.35rem;">
            <i class="ri-external-link-line"></i> Lihat Website
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:none;border:1px solid var(--card-border);color:var(--text-secondary);padding:0.4rem 0.875rem;border-radius:8px;font-size:0.85rem;cursor:pointer;font-family:inherit;transition:all 0.2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--card-border)';this.style.color='var(--text-secondary)'">
                <i class="ri-logout-box-line"></i> Keluar
            </button>
        </form>
    </div>
</nav>

<div class="admin-layout">
    {{-- SIDEBAR --}}
    <aside class="admin-sidebar">
        <div class="sidebar-label">Navigasi</div>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="ri-dashboard-line"></i> Dashboard
        </a>
        <a href="{{ route('admin.themes') }}" class="sidebar-link {{ request()->routeIs('admin.themes') ? 'active' : '' }}">
            <i class="ri-palette-line"></i> Pilih Tema
        </a>
        <a href="{{ route('admin.sliders') }}" class="sidebar-link {{ request()->routeIs('admin.sliders') ? 'active' : '' }}">
            <i class="ri-image-2-line"></i> Kelola Slider
        </a>

        <div class="sidebar-label">Halaman Publik</div>
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link"><i class="ri-home-4-line"></i> Beranda</a>
        <a href="{{ route('smk') }}" target="_blank" class="sidebar-link"><i class="ri-graduation-cap-line"></i> SMK</a>
        <a href="{{ route('smp') }}" target="_blank" class="sidebar-link"><i class="ri-book-open-line"></i> SMP</a>
        <a href="{{ route('spmb') }}" target="_blank" class="sidebar-link"><i class="ri-file-text-line"></i> SPMB</a>
        <a href="{{ route('bkk') }}" target="_blank" class="sidebar-link"><i class="ri-briefcase-line"></i> BKK</a>

        <div class="sidebar-label">Akun</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link" style="width:100%;background:none;border:none;cursor:pointer;text-align:left;font-family:inherit;">
                <i class="ri-logout-box-line"></i> Keluar
            </button>
        </form>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        @yield('admin-content')
    </main>
</div>

<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>
