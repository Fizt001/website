@extends('layouts.app')
@section('title', 'SMP Tinta Emas Indonesia')
@section('meta_desc', 'SMP Tinta Emas Indonesia — Sekolah Menengah Pertama yang membentuk karakter kuat, akademik hebat, dan potensi tak terbatas.')

@section('content')

{{-- HERO + SLIDER --}}
<section class="hero" id="beranda" style="min-height:70vh;">
    <div class="hero-bg">
        @include('partials.hero-overlay')
        <div class="hero-orb hero-orb-1" style="background:rgba(5,150,105,0.12);"></div>
        <canvas id="particles-canvas"></canvas>
    </div>
    @if($sliders->count() > 0)
    <div style="position:absolute;inset:0;z-index:1;">
        <div class="slider-container" data-slider style="height:100%;border-radius:0;">
            <div class="slider-track" style="height:100%;">
                @foreach($sliders as $slide)
                <div class="slider-item" style="height:70vh;">
                    <img src="{{ asset('storage/'.$slide->image_path) }}" alt="{{ $slide->title }}" style="width:100%;height:100%;object-fit:cover;filter:brightness(0.4);">
                </div>
                @endforeach
            </div>
            <button class="slider-btn prev"><i class="ri-arrow-left-s-line"></i></button>
            <button class="slider-btn next"><i class="ri-arrow-right-s-line"></i></button>
        </div>
    </div>
    @else
    <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(6,78,59,0.85),rgba(0,0,0,0.6));z-index:1;"></div>
    @endif
    <div class="hero-content" style="z-index:3;">
        @php $logoSmp = \App\Models\Setting::get('logo_smp'); @endphp
        @if($logoSmp)
            <img src="{{ Storage::url($logoSmp) }}" alt="Logo SMP" style="height:80px;margin-bottom:1.5rem;object-fit:contain;animation: fadeUp 0.8s ease-out;">
        @else
            <div class="hero-badge"><i class="ri-book-open-line"></i> SMP Tinta Emas Indonesia</div>
        @endif
        <h1 class="hero-title">{{ $contents['hero'][0]->value ?? 'SMP Tinta Emas Indonesia' }}</h1>
        <p class="hero-subtitle">{{ $contents['hero'][1]->value ?? 'Sekolah Menengah Pertama yang membentuk karakter kuat dan akademik hebat.' }}</p>
        <div class="hero-actions">
            <a href="{{ route('spmb') }}" class="btn-primary"><i class="ri-user-add-line"></i> Daftar SMP</a>
            <a href="#program" class="btn-outline"><i class="ri-apps-line"></i> Program Unggulan</a>
        </div>
    </div>
</section>

{{-- QUICK INFO --}}
<div style="background:var(--card-bg);border-bottom:1px solid var(--card-border);padding:1.25rem 0;">
    <div class="container info-bar-grid">
        <div class="info-bar-item">
            <i class="ri-medal-line"></i>
            <span>Akreditasi: <strong>{{ $contents['akreditasi'][0]->value ?? 'A (Unggul)' }}</strong></span>
        </div>
        <div class="info-bar-item">
            <i class="ri-group-line"></i>
            <span>Siswa Aktif: <strong>600+</strong></span>
        </div>
        <div class="info-bar-item">
            <i class="ri-map-pin-line"></i>
            <span>Lokasi: <strong>Strategis & Aman</strong></span>
        </div>
        <div class="info-bar-item">
            <i class="ri-award-line"></i>
            <span>Ekstrakurikuler: <strong>40+ Pilihan</strong></span>
        </div>
    </div>
</div>

{{-- TENTANG --}}
<section class="section" id="tentang">
    <div class="container">
        <div class="vm-grid reveal" style="align-items:center;gap:3rem;">
            <div class="card" style="padding:2rem;">
                <div style="font-size:1.4rem;font-weight:800;color:var(--text-primary);margin-bottom:1.5rem;font-family:var(--font-heading);">Keunggulan SMP Tinta Emas</div>
                @foreach(['Kurikulum Merdeka & karakter islami','Kelas bilingual (Inggris-Indonesia)','Program olimpiade sains nasional','Ekstrakurikuler lengkap (40+ kegiatan)','Smart classroom berbasis teknologi','Lingkungan belajar aman & kondusif'] as $item)
                <div style="display:flex;align-items:flex-start;gap:0.75rem;margin-bottom:1rem;font-size:0.9rem;color:var(--text-secondary);">
                    <i class="ri-checkbox-circle-fill" style="color:var(--accent);font-size:1.1rem;margin-top:1px;flex-shrink:0;"></i>
                    <span>{{ $item }}</span>
                </div>
                @endforeach
            </div>
            <div>
                <div class="section-tag"><i class="ri-school-line"></i> Tentang SMP</div>
                <h2 class="section-title" style="text-align:left;margin-top:0.75rem;">{{ $contents['about'][0]->value ?? 'Tentang SMP Tinta Emas Indonesia' }}</h2>
                <div class="section-divider" style="margin:1rem 0;"></div>
                <p style="color:var(--text-secondary);line-height:1.8;font-size:0.95rem;">{{ $contents['about'][1]->value ?? '' }}</p>
                <a href="{{ route('spmb') }}" class="btn-primary" style="margin-top:2rem;display:inline-flex;"><i class="ri-user-add-line"></i> Daftar Sekarang</a>
            </div>
        </div>
    </div>
</section>

{{-- PROGRAM UNGGULAN --}}
<section class="section section-alt" id="program">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-apps-line"></i> Program Unggulan</div>
            <h2 class="section-title">Program Unggulan SMP</h2>
            <div class="section-divider"></div>
        </div>
        <div class="programs-grid">
            @foreach($programs as $program)
            <div class="program-card reveal" onclick="openProgramModal({{ $program->id }})" title="Klik untuk melihat detail program">
                <div class="program-icon">
                    @if($program->image_icon)
                        <img src="{{ Storage::url($program->image_icon) }}" alt="{{ $program->title }}" style="width:48px;height:48px;object-fit:contain;border-radius:8px;">
                    @else
                        {{ $program->icon }}
                    @endif
                </div>
                <div class="program-title">{{ $program->title }}</div>
                <div class="program-desc">{{ $program->description }}</div>
                <div class="program-link" style="margin-top:1.5rem;font-size:0.85rem;color:var(--accent);font-weight:600;display:flex;align-items:center;gap:0.25rem;">
                    Lihat Galeri <i class="ri-arrow-right-line"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.program-modal')

{{-- VISI MISI --}}
<section class="section" id="visi-misi">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-eye-line"></i> Visi & Misi</div>
            <h2 class="section-title">Visi & Misi SMP</h2>
            <div class="section-divider"></div>
        </div>
        <div class="vm-grid">
            <div class="vm-card reveal">
                <div class="vm-icon">🔭</div>
                <div class="vm-title">Visi SMP</div>
                <div class="vm-text">{{ $contents['vision'][0]->value ?? 'Menjadi SMP terbaik yang melahirkan siswa berakhlak mulia, cerdas, kreatif, dan berwawasan luas.' }}</div>
            </div>
            <div class="vm-card reveal">
                <div class="vm-icon">🚀</div>
                <div class="vm-title">Misi SMP</div>
                <div class="vm-text">{{ $contents['mission'][0]->value ?? '' }}</div>
            </div>
        </div>
    </div>
</section>

{{-- STATS --}}
<section class="section section-alt">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item reveal"><div class="stat-number" data-count="400" data-suffix="+">0</div><div class="stat-label">Siswa Aktif</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="40" data-suffix="+">0</div><div class="stat-label">Tenaga Pengajar</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="100" data-suffix="+">0</div><div class="stat-label">Prestasi & Penghargaan</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="98" data-suffix="%">0</div><div class="stat-label">Lulus ke SMA/SMK Favorit</div></div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:5rem 0;background:var(--btn-primary);">
    <div class="container" style="text-align:center;">
        <h2 style="font-family:var(--font-heading);font-size:clamp(1.5rem,4vw,2.25rem);font-weight:900;color:white;margin-bottom:1rem;">Daftarkan Putra-Putri Anda di SMP Tinta Emas!</h2>
        <p style="color:rgba(255,255,255,0.85);margin-bottom:2rem;">Berikan pendidikan terbaik untuk masa depan cerah mereka.</p>
        <a href="{{ route('spmb') }}" style="background:white;color:var(--accent2,#065f46);padding:0.875rem 2.5rem;border-radius:12px;font-weight:800;text-decoration:none;display:inline-flex;align-items:center;gap:0.5rem;">
            <i class="ri-user-add-line"></i> Daftar SMP Sekarang
        </a>
    </div>
</section>

@endsection
