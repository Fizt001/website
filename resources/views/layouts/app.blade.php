<!DOCTYPE html>
<html lang="id" data-theme="{{ $theme ?? 'aurora' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_desc', 'Website resmi Yayasan Tinta Emas Indonesia — SMK, SMP, SPMB, dan BKK Tinta Emas Indonesia.')">
    <title>@yield('title', 'Tinta Emas Indonesia') — Yayasan Tinta Emas Indonesia</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css?v={{ filemtime(public_path('css/main.css')) }}">
    <link rel="stylesheet" href="/css/theme-{{ $theme ?? 'aurora' }}.css" id="theme-stylesheet">
    @stack('head')
</head>
<body>

<nav class="navbar" id="navbar">
    <a href="{{ route('home') }}" class="navbar-brand">
        @php $siteLogo = \App\Models\Setting::get('site_logo'); @endphp
        @if($siteLogo)
            <img src="{{ Storage::url($siteLogo) }}" alt="Logo" style="height:44px;object-fit:contain;border-radius:8px;">
        @else
            <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, #00f5ff, #7c3aed); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; color: white; flex-shrink: 0;">TE</div>
        @endif
        <div class="navbar-name">
            Tinta Emas Indonesia
            <span>Yayasan Pendidikan</span>
        </div>
    </a>
    <ul class="navbar-menu" id="navMenu">
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li><a href="{{ route('smk') }}">SMK</a></li>
        <li><a href="{{ route('smp') }}">SMP</a></li>
        <li><a href="{{ route('spmb') }}">SPMB</a></li>
        <li><a href="{{ route('bkk') }}">BKK</a></li>

    </ul>
    <button class="navbar-hamburger" id="hamburger" aria-label="Menu" style="background:transparent;border:none;padding:0;">
        <i class="ri-menu-3-line" style="font-size:1.8rem;color:var(--text-primary);"></i>
    </button>
</nav>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-brand-name">Yayasan Tinta Emas Indonesia</div>
                <div class="footer-brand-sub">Mencetak Generasi Emas Bangsa</div>
                <p class="footer-desc">Lembaga pendidikan swasta yang berkomitmen menghadirkan pendidikan berkualitas, inovatif, dan berdaya saing global untuk generasi penerus bangsa.</p>
                <div class="footer-socials">
                    @if(!empty($settings['instagram']))<a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener" class="social-icon" title="Instagram"><i class="ri-instagram-line"></i></a>@endif
                    @if(!empty($settings['facebook']))<a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener" class="social-icon" title="Facebook"><i class="ri-facebook-fill"></i></a>@endif
                    @if(!empty($settings['youtube']))<a href="{{ $settings['youtube'] }}" target="_blank" rel="noopener" class="social-icon" title="YouTube"><i class="ri-youtube-fill"></i></a>@endif
                    @if(!empty($settings['tiktok']))<a href="{{ $settings['tiktok'] }}" target="_blank" rel="noopener" class="social-icon" title="TikTok"><i class="ri-tiktok-fill"></i></a>@endif
                    @if(!empty($settings['whatsapp']))<a href="{{ $settings['whatsapp'] }}" target="_blank" rel="noopener" class="social-icon" title="WhatsApp"><i class="ri-whatsapp-line"></i></a>@endif
                    @if(!empty($settings['twitter']))<a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener" class="social-icon" title="X / Twitter"><i class="ri-twitter-x-fill"></i></a>@endif
                </div>
            </div>
            <div>
                <div class="footer-heading">Unit Pendidikan</div>
                <ul class="footer-links">
                    <li><a href="{{ route('smk') }}"><i class="ri-arrow-right-s-line"></i> SMK Tinta Emas</a></li>
                    <li><a href="{{ route('smp') }}"><i class="ri-arrow-right-s-line"></i> SMP Tinta Emas</a></li>
                    <li><a href="{{ route('spmb') }}"><i class="ri-arrow-right-s-line"></i> SPMB</a></li>
                    <li><a href="{{ route('bkk') }}"><i class="ri-arrow-right-s-line"></i> BKK</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-heading">Informasi</div>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}#tentang"><i class="ri-arrow-right-s-line"></i> Tentang Yayasan</a></li>
                    <li><a href="{{ route('home') }}#visi-misi"><i class="ri-arrow-right-s-line"></i> Visi &amp; Misi</a></li>
                    <li><a href="{{ route('spmb') }}"><i class="ri-arrow-right-s-line"></i> Pendaftaran Siswa</a></li>
                    <li><a href="{{ route('bkk') }}"><i class="ri-arrow-right-s-line"></i> Lowongan Kerja</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-heading">Kontak</div>
                <ul class="footer-links">
                    <li><a href="tel:{{ $settings['phone'] ?? '' }}"><i class="ri-phone-line"></i> {{ $settings['phone'] ?? 'Hubungi Kami' }}</a></li>
                    <li><a href="mailto:{{ $settings['email'] ?? '' }}"><i class="ri-mail-line"></i> {{ $settings['email'] ?? 'Email Kami' }}</a></li>
                    <li style="color:var(--text-secondary);font-size:0.875rem;line-height:1.6;margin-top:0.5rem;">
                        <i class="ri-map-pin-line"></i> {{ $settings['address'] ?? 'Alamat Sekolah' }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">&copy; {{ date('Y') }} <a href="{{ route('home') }}">Yayasan Tinta Emas Indonesia</a>. Semua Hak Dilindungi.</div>
            <div style="font-size:0.8rem;color:var(--text-secondary);">SMK · SMP · SPMB · BKK</div>
        </div>
    </div>
</footer>

<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>
