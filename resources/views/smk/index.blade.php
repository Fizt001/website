@extends('layouts.app')
@section('title', 'SMK Tinta Emas Indonesia')
@section('meta_desc', 'SMK Tinta Emas Indonesia — Sekolah Menengah Kejuruan dengan program keahlian berbasis industri dan teknologi terkini. Akreditasi A.')

@section('content')

{{-- HERO + SLIDER --}}
<section class="hero" id="beranda" style="min-height:70vh;">
    <div class="hero-bg">
        <div class="hero-orb hero-orb-1"></div>
        <canvas id="particles-canvas"></canvas>
    </div>
    @if($sliders->count() > 0)
    <div style="position:absolute;inset:0;z-index:1;">
        <div class="slider-container" data-slider style="height:100%;border-radius:0;">
            <div class="slider-track" style="height:100%;">
                @foreach($sliders as $slide)
                <div class="slider-item" style="height:70vh;">
                    <img src="{{ asset('storage/'.$slide->image_path) }}" alt="{{ $slide->title }}" style="width:100%;height:100%;object-fit:cover;filter:brightness(0.45);">
                </div>
                @endforeach
            </div>
            <button class="slider-btn prev"><i class="ri-arrow-left-s-line"></i></button>
            <button class="slider-btn next"><i class="ri-arrow-right-s-line"></i></button>
        </div>
    </div>
    @else
    <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(30,58,95,0.85),rgba(0,0,0,0.6));z-index:1;"></div>
    @endif
    <div class="hero-content" style="z-index:3;">
        <div class="hero-badge"><i class="ri-graduation-cap-line"></i> SMK Tinta Emas Indonesia</div>
        <h1 class="hero-title">{{ $contents['hero'][0]->value ?? 'SMK Tinta Emas Indonesia' }}</h1>
        <p class="hero-subtitle">{{ $contents['hero'][1]->value ?? 'Sekolah Menengah Kejuruan unggulan dengan program keahlian berbasis industri.' }}</p>
        <div class="hero-actions">
            <a href="{{ route('spmb') }}" class="btn-primary"><i class="ri-user-add-line"></i> Daftar SMK</a>
            <a href="#program" class="btn-outline"><i class="ri-apps-line"></i> Program Keahlian</a>
        </div>
    </div>
</section>

{{-- QUICK INFO BAR --}}
<div style="background:var(--card-bg);border-bottom:1px solid var(--card-border);padding:1.25rem 0;">
    <div class="container" style="display:flex;gap:2rem;justify-content:center;flex-wrap:wrap;">
        <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.9rem;color:var(--text-secondary);">
            <i class="ri-medal-line" style="color:var(--accent);font-size:1.2rem;"></i>
            <span>Akreditasi: <strong style="color:var(--text-primary);">{{ $contents['akreditasi'][0]->value ?? 'A (Unggul)' }}</strong></span>
        </div>
        <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.9rem;color:var(--text-secondary);">
            <i class="ri-group-line" style="color:var(--accent);font-size:1.2rem;"></i>
            <span>Siswa Aktif: <strong style="color:var(--text-primary);">800+</strong></span>
        </div>
        <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.9rem;color:var(--text-secondary);">
            <i class="ri-briefcase-line" style="color:var(--accent);font-size:1.2rem;"></i>
            <span>Mitra Industri: <strong style="color:var(--text-primary);">120+</strong></span>
        </div>
        <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.9rem;color:var(--text-secondary);">
            <i class="ri-building-2-line" style="color:var(--accent);font-size:1.2rem;"></i>
            <span>Program Keahlian: <strong style="color:var(--text-primary);">6 Jurusan</strong></span>
        </div>
    </div>
</div>

{{-- TENTANG SMK --}}
<section class="section" id="tentang">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;" class="reveal">
            <div>
                <div class="section-tag"><i class="ri-school-line"></i> Tentang SMK</div>
                <h2 class="section-title" style="text-align:left;margin-top:0.75rem;">{{ $contents['about'][0]->value ?? 'Tentang SMK Tinta Emas Indonesia' }}</h2>
                <div class="section-divider" style="margin:1rem 0;"></div>
                <p style="color:var(--text-secondary);line-height:1.9;">{{ $contents['about'][1]->value ?? '' }}</p>
                <a href="{{ route('spmb') }}" class="btn-primary" style="margin-top:2rem;display:inline-flex;"><i class="ri-user-add-line"></i> Daftar Sekarang</a>
            </div>
            <div class="card" style="padding:2rem;">
                <div style="font-size:1.5rem;font-weight:800;color:var(--text-primary);margin-bottom:1.5rem;font-family:var(--font-heading);">Mengapa Pilih SMK Kami?</div>
                @foreach(['Kurikulum berbasis industri & DUDI','Teaching Factory & unit produksi aktif','Prakerin di perusahaan nasional & multinasional','Sertifikasi kompetensi nasional','BKK aktif — lulusan langsung tersalurkan kerja','Fasilitas lab & workshop modern'] as $item)
                <div style="display:flex;align-items:flex-start;gap:0.75rem;margin-bottom:1rem;font-size:0.9rem;color:var(--text-secondary);">
                    <i class="ri-checkbox-circle-fill" style="color:var(--accent);font-size:1.1rem;margin-top:1px;flex-shrink:0;"></i>
                    <span>{{ $item }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- PROGRAM KEAHLIAN --}}
<section class="section section-alt" id="program">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-apps-line"></i> Program Keahlian</div>
            <h2 class="section-title">Program Keahlian SMK</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Pilih jurusan sesuai minat dan bakat Anda, semua dirancang selaras dengan kebutuhan industri terkini.</p>
        </div>
        <div class="programs-grid">
            @foreach([
                ['💻','Teknik Komputer & Jaringan','Rekayasa perangkat keras, jaringan komputer, dan keamanan siber.'],
                ['📱','Rekayasa Perangkat Lunak','Pengembangan aplikasi mobile, web, dan sistem informasi.'],
                ['⚡','Teknik Instalasi Tenaga Listrik','Instalasi, pemeliharaan, dan perbaikan sistem kelistrikan.'],
                ['🔧','Teknik Kendaraan Ringan','Perawatan dan perbaikan kendaraan bermotor modern.'],
                ['🏢','Akuntansi & Keuangan Lembaga','Keuangan, akuntansi, perbankan, dan administrasi bisnis.'],
                ['🎨','Desain Komunikasi Visual','Branding, ilustrasi digital, fotografi, dan media kreatif.'],
            ] as [$icon,$title,$desc])
            <div class="program-card reveal">
                <div class="program-icon">{{ $icon }}</div>
                <div class="program-title">{{ $title }}</div>
                <div class="program-desc">{{ $desc }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="section" id="visi-misi">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-eye-line"></i> Visi & Misi</div>
            <h2 class="section-title">Visi & Misi SMK</h2>
            <div class="section-divider"></div>
        </div>
        <div class="vm-grid">
            <div class="vm-card reveal">
                <div class="vm-icon">🔭</div>
                <div class="vm-title">Visi SMK</div>
                <div class="vm-text">{{ $contents['vision'][0]->value ?? 'Menjadi SMK unggul yang menghasilkan lulusan kompeten, berkarakter, dan siap bersaing di dunia kerja maupun wirausaha.' }}</div>
            </div>
            <div class="vm-card reveal">
                <div class="vm-icon">🚀</div>
                <div class="vm-title">Misi SMK</div>
                <div class="vm-text">{{ $contents['mission'][0]->value ?? '' }}</div>
            </div>
        </div>
    </div>
</section>

{{-- PRESTASI --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-trophy-line"></i> Prestasi</div>
            <h2 class="section-title">Prestasi & Penghargaan</h2>
            <div class="section-divider"></div>
        </div>
        <div class="stats-grid">
            <div class="stat-item reveal"><div class="stat-number" data-count="800" data-suffix="+">0</div><div class="stat-label">Siswa Aktif</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="95" data-suffix="%">0</div><div class="stat-label">Tingkat Keterserapan Kerja</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="120" data-suffix="+">0</div><div class="stat-label">Mitra Industri & DUDI</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="150" data-suffix="+">0</div><div class="stat-label">Prestasi Lomba Nasional</div></div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:5rem 0;background:var(--btn-primary);">
    <div class="container" style="text-align:center;">
        <h2 style="font-family:var(--font-heading);font-size:clamp(1.5rem,4vw,2.25rem);font-weight:900;color:white;margin-bottom:1rem;">Jadilah Bagian dari SMK Tinta Emas!</h2>
        <p style="color:rgba(255,255,255,0.85);margin-bottom:2rem;">Daftarkan diri Anda sekarang dan raih masa depan gemilang bersama kami.</p>
        <a href="{{ route('spmb') }}" style="background:white;color:var(--accent2,#1e3a5f);padding:0.875rem 2.5rem;border-radius:12px;font-weight:800;text-decoration:none;display:inline-flex;align-items:center;gap:0.5rem;">
            <i class="ri-user-add-line"></i> Daftar SMK Sekarang
        </a>
    </div>
</section>

@endsection
