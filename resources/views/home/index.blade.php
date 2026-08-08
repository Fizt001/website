@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_desc', 'Website resmi Yayasan Tinta Emas Indonesia. Menaungi SMK, SMP, SPMB, dan BKK Tinta Emas Indonesia.')

@section('content')

{{-- HERO --}}
<section class="hero" id="beranda">
    <div class="hero-bg">
        @include('partials.hero-overlay')
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <canvas id="particles-canvas"></canvas>
    </div>
    <div class="hero-content">
        <div class="hero-badge"><i class="ri-star-fill"></i> Yayasan Tinta Emas Indonesia</div>
        <h1 class="hero-title">
            <span class="highlight">{{ $contents['hero'][0]->value ?? 'Mencetak Generasi Emas Bangsa' }}</span>
        </h1>
        <p class="hero-subtitle">{{ $contents['hero'][1]->value ?? 'Yayasan Tinta Emas Indonesia berkomitmen menghadirkan pendidikan berkualitas, inovatif, dan berdaya saing global.' }}</p>
        <div class="hero-actions">
            <a href="{{ route('spmb') }}" class="btn-primary"><i class="ri-user-add-line"></i> Daftar Sekarang</a>
            <a href="#tentang" class="btn-outline"><i class="ri-information-line"></i> Pelajari Lebih</a>
        </div>
    </div>
    <div style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);animation:float 2s ease-in-out infinite;z-index:2;">
        <a href="#unit" style="color:var(--text-secondary);font-size:1.5rem;"><i class="ri-arrow-down-line"></i></a>
    </div>
</section>

{{-- TECH BANNER --}}
<div class="tech-banner">
    <div class="tech-banner-track">
        @foreach(['Pendidikan Berkualitas','Teknologi Modern','Karakter Unggul','Siap Kerja','Berdaya Saing Global','Akreditasi A','Mitra Industri','Lulusan Profesional','Pendidikan Berkualitas','Teknologi Modern','Karakter Unggul','Siap Kerja','Berdaya Saing Global','Akreditasi A','Mitra Industri','Lulusan Profesional'] as $item)
        <span class="tech-banner-item"><span>✦</span> {{ $item }}</span>
        @endforeach
    </div>
</div>

{{-- 4 UNIT CARDS --}}
<section class="section" id="unit">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-building-2-line"></i> Unit Pendidikan</div>
            <h2 class="section-title">Pilih Unit Pendidikan Anda</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Empat unit layanan pendidikan terintegrasi di bawah naungan Yayasan Tinta Emas Indonesia.</p>
        </div>

        <div class="unit-cards">
            {{-- SMK --}}
            <a href="{{ route('smk') }}" class="unit-card reveal">
                <div class="unit-card-slider" style="height:200px;overflow:hidden;background:linear-gradient(135deg,#1e3a5f,#2d5491);display:flex;align-items:center;justify-content:center;">
                    @if($sliders->where('unit','smk')->count() > 0)
                    <img src="{{ asset('storage/'.$sliders->where('unit','smk')->first()->image_path) }}" alt="SMK" style="width:100%;height:100%;object-fit:cover;">
                    @else
                    <div style="text-align:center;color:rgba(255,255,255,0.8);">
                        <div style="font-size:3.5rem;margin-bottom:0.5rem;">🏫</div>
                        <div style="font-weight:700;font-size:1rem;">SMK Tinta Emas</div>
                    </div>
                    @endif
                </div>
                <div class="unit-card-body">
                    <div class="unit-card-icon">🎓</div>
                    <div class="unit-card-title">SMK Tinta Emas Indonesia</div>
                    <div class="unit-card-desc">Sekolah Menengah Kejuruan dengan program keahlian berbasis industri dan teknologi terkini. Akreditasi A.</div>
                    <div class="unit-card-arrow">Selengkapnya <i class="ri-arrow-right-line"></i></div>
                </div>
            </a>

            {{-- SMP --}}
            <a href="{{ route('smp') }}" class="unit-card reveal">
                <div class="unit-card-slider" style="height:200px;overflow:hidden;background:linear-gradient(135deg,#065f46,#047857);display:flex;align-items:center;justify-content:center;">
                    @if($sliders->where('unit','smp')->count() > 0)
                    <img src="{{ asset('storage/'.$sliders->where('unit','smp')->first()->image_path) }}" alt="SMP" style="width:100%;height:100%;object-fit:cover;">
                    @else
                    <div style="text-align:center;color:rgba(255,255,255,0.8);">
                        <div style="font-size:3.5rem;margin-bottom:0.5rem;">📚</div>
                        <div style="font-weight:700;font-size:1rem;">SMP Tinta Emas</div>
                    </div>
                    @endif
                </div>
                <div class="unit-card-body">
                    <div class="unit-card-icon">📖</div>
                    <div class="unit-card-title">SMP Tinta Emas Indonesia</div>
                    <div class="unit-card-desc">Sekolah Menengah Pertama yang membentuk karakter kuat, akademik hebat, dan potensi tak terbatas.</div>
                    <div class="unit-card-arrow">Selengkapnya <i class="ri-arrow-right-line"></i></div>
                </div>
            </a>

            {{-- SPMB --}}
            <a href="{{ route('spmb') }}" class="unit-card reveal">
                <div class="unit-card-slider" style="height:200px;overflow:hidden;background:linear-gradient(135deg,#7c2d12,#c2410c);display:flex;align-items:center;justify-content:center;">
                    @if($sliders->where('unit','spmb')->count() > 0)
                    <img src="{{ asset('storage/'.$sliders->where('unit','spmb')->first()->image_path) }}" alt="SPMB" style="width:100%;height:100%;object-fit:cover;">
                    @else
                    <div style="text-align:center;color:rgba(255,255,255,0.8);">
                        <div style="font-size:3.5rem;margin-bottom:0.5rem;">📝</div>
                        <div style="font-weight:700;font-size:1rem;">SPMB Tinta Emas</div>
                    </div>
                    @endif
                </div>
                <div class="unit-card-body">
                    <div class="unit-card-icon">✏️</div>
                    <div class="unit-card-title">SPMB Tinta Emas Indonesia</div>
                    <div class="unit-card-desc">Sistem Penerimaan Murid Baru yang transparan, mudah, dan terpercaya. Daftar online sekarang!</div>
                    <div class="unit-card-arrow">Daftar Sekarang <i class="ri-arrow-right-line"></i></div>
                </div>
            </a>

            {{-- BKK --}}
            <a href="{{ route('bkk') }}" class="unit-card reveal">
                <div class="unit-card-slider" style="height:200px;overflow:hidden;background:linear-gradient(135deg,#581c87,#7c3aed);display:flex;align-items:center;justify-content:center;">
                    @if($sliders->where('unit','bkk')->count() > 0)
                    <img src="{{ asset('storage/'.$sliders->where('unit','bkk')->first()->image_path) }}" alt="BKK" style="width:100%;height:100%;object-fit:cover;">
                    @else
                    <div style="text-align:center;color:rgba(255,255,255,0.8);">
                        <div style="font-size:3.5rem;margin-bottom:0.5rem;">💼</div>
                        <div style="font-weight:700;font-size:1rem;">BKK Tinta Emas</div>
                    </div>
                    @endif
                </div>
                <div class="unit-card-body">
                    <div class="unit-card-icon">💼</div>
                    <div class="unit-card-title">BKK Tinta Emas Indonesia</div>
                    <div class="unit-card-desc">Bursa Kerja Khusus yang menghubungkan lulusan terbaik dengan ratusan perusahaan mitra terpercaya.</div>
                    <div class="unit-card-arrow">Lihat Lowongan <i class="ri-arrow-right-line"></i></div>
                </div>
            </a>
        </div>
    </div>
</section>

<div class="neon-line"></div>

{{-- HERO SLIDER (Galeri Sekolah) --}}
@if($sliders->count() > 0)
<section class="section section-alt" id="galeri">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-image-line"></i> Galeri</div>
            <h2 class="section-title">Kehidupan di Tinta Emas Indonesia</h2>
            <div class="section-divider"></div>
        </div>
        <div class="slider-container reveal" data-slider style="height:480px;border-radius:20px;overflow:hidden;">
            <div class="slider-track">
                @foreach($sliders->where('unit','home') as $slide)
                <div class="slider-item">
                    <img src="{{ asset('storage/'.$slide->image_path) }}" alt="{{ $slide->title }}" style="width:100%;height:480px;object-fit:cover;">
                    @if($slide->title || $slide->caption)
                    <div class="slider-overlay">
                        @if($slide->title)<h3>{{ $slide->title }}</h3>@endif
                        @if($slide->caption)<p>{{ $slide->caption }}</p>@endif
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <button class="slider-btn prev" aria-label="Sebelumnya"><i class="ri-arrow-left-s-line"></i></button>
            <button class="slider-btn next" aria-label="Berikutnya"><i class="ri-arrow-right-s-line"></i></button>
            <div class="slider-dots">
                @foreach($sliders->where('unit','home') as $i => $slide)
                <button class="slider-dot {{ $i === 0 ? 'active' : '' }}" aria-label="Slide {{ $i+1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- STATISTIK --}}
<section class="section stats-section" id="statistik">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-bar-chart-line"></i> Pencapaian</div>
            <h2 class="section-title">Tinta Emas dalam Angka</h2>
            <div class="section-divider"></div>
        </div>
        <div class="stats-grid">
            <div class="stat-item reveal">
                <div class="stat-number" data-count="1200" data-suffix="+">0</div>
                <div class="stat-label">Siswa Aktif</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-count="80" data-suffix="+">0</div>
                <div class="stat-label">Tenaga Pengajar</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-count="15" data-suffix="+">0</div>
                <div class="stat-label">Tahun Berdiri</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-count="500" data-suffix="+">0</div>
                <div class="stat-label">Alumni Terserap Kerja</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-count="120" data-suffix="+">0</div>
                <div class="stat-label">Mitra Industri</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-count="200" data-suffix="+">0</div>
                <div class="stat-label">Penghargaan & Prestasi</div>
            </div>
        </div>
    </div>
</section>

{{-- TENTANG YAYASAN --}}
<section class="section" id="tentang">
    <div class="container">
        <div class="vm-grid reveal" style="align-items:center;gap:3rem;">
            <div>
                <div class="section-tag"><i class="ri-building-line"></i> Tentang Kami</div>
                <h2 class="section-title" style="text-align:left;margin-top:0.75rem;">{{ $contents['about'][0]->value ?? 'Tentang Yayasan Tinta Emas Indonesia' }}</h2>
                <div class="section-divider" style="margin:1rem 0;"></div>
                <p style="color:var(--text-secondary);line-height:1.8;font-size:0.95rem;">
                    {{ $contents['about'][1]->value ?? 'Yayasan Tinta Emas Indonesia adalah lembaga pendidikan swasta yang berdedikasi tinggi dalam membentuk karakter dan kompetensi generasi muda Indonesia.' }}
                </p>
                <div style="display:flex;gap:1.5rem;margin-top:2rem;flex-wrap:wrap;">
                    <div style="display:flex;align-items:center;gap:0.5rem;color:var(--accent);font-weight:600;font-size:0.9rem;">
                        <i class="ri-checkbox-circle-fill"></i> Akreditasi A
                    </div>
                    <div style="display:flex;align-items:center;gap:0.5rem;color:var(--accent);font-weight:600;font-size:0.9rem;">
                        <i class="ri-checkbox-circle-fill"></i> ISO Certified
                    </div>
                    <div style="display:flex;align-items:center;gap:0.5rem;color:var(--accent);font-weight:600;font-size:0.9rem;">
                        <i class="ri-checkbox-circle-fill"></i> Mitra 120+ Industri
                    </div>
                </div>
                <a href="{{ route('spmb') }}" class="btn-primary" style="margin-top:2rem;display:inline-flex;">
                    <i class="ri-user-add-line"></i> Bergabung Sekarang
                </a>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="card" style="padding:1.5rem;text-align:center;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">🏆</div>
                    <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;">Prestasi Nasional</div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);margin-top:0.25rem;">200+ penghargaan bergengsi</div>
                </div>
                <div class="card" style="padding:1.5rem;text-align:center;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">🤝</div>
                    <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;">Mitra Industri</div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);margin-top:0.25rem;">120+ perusahaan mitra</div>
                </div>
                <div class="card" style="padding:1.5rem;text-align:center;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">💻</div>
                    <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;">Fasilitas Modern</div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);margin-top:0.25rem;">Lab & workshop canggih</div>
                </div>
                <div class="card" style="padding:1.5rem;text-align:center;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">🎯</div>
                    <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;">Lulusan Siap Kerja</div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);margin-top:0.25rem;">95% terserap industri</div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="neon-line"></div>

{{-- VISI MISI --}}
<section class="section section-alt" id="visi-misi">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-eye-line"></i> Visi & Misi</div>
            <h2 class="section-title">Visi & Misi Yayasan</h2>
            <div class="section-divider"></div>
        </div>
        <div class="vm-grid">
            <div class="vm-card reveal">
                <div class="vm-icon">🔭</div>
                <div class="vm-title">Visi</div>
                <div class="vm-text">{{ $contents['vision'][0]->value ?? 'Menjadi lembaga pendidikan terkemuka yang melahirkan generasi berakhlak mulia, berprestasi, berjiwa wirausaha, dan mampu bersaing di era global.' }}</div>
            </div>
            <div class="vm-card reveal">
                <div class="vm-icon">🚀</div>
                <div class="vm-title">Misi</div>
                <div class="vm-text">{{ $contents['mission'][0]->value ?? '' }}</div>
            </div>
        </div>
    </div>
</section>

{{-- CTA BANNER --}}
<section style="padding:5rem 0;background:var(--btn-primary);">
    <div class="container" style="text-align:center;">
        <h2 style="font-family:var(--font-heading);font-size:clamp(1.5rem,4vw,2.5rem);font-weight:900;color:white;margin-bottom:1rem;">Siap Bergabung dengan Keluarga Tinta Emas?</h2>
        <p style="color:rgba(255,255,255,0.85);font-size:1.1rem;margin-bottom:2rem;">Daftarkan putra-putri Anda sekarang dan wujudkan impian bersama kami.</p>
        <a href="{{ route('spmb') }}" style="background:white;color:var(--accent2,#1e3a5f);padding:0.875rem 2.5rem;border-radius:12px;font-weight:800;text-decoration:none;display:inline-flex;align-items:center;gap:0.5rem;font-size:1rem;transition:transform 0.2s,box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
            <i class="ri-user-add-line"></i> Daftar Sekarang — Gratis
        </a>
    </div>
</section>

@endsection
