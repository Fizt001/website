@extends('layouts.app')
@section('title', 'BKK Tinta Emas Indonesia')
@section('meta_desc', 'BKK Tinta Emas Indonesia — Bursa Kerja Khusus yang menghubungkan lulusan terbaik dengan perusahaan mitra terpercaya.')

@section('content')

{{-- HERO --}}
<section class="hero" id="beranda" style="min-height:60vh;">
    <div class="hero-bg">
        <div class="hero-orb hero-orb-1" style="background:rgba(109,40,217,0.12);"></div>
        <canvas id="particles-canvas"></canvas>
        @if($sliders->count() > 0)
        <div style="position:absolute;inset:0;z-index:1;">
            <div class="slider-container" data-slider style="height:100%;border-radius:0;">
                <div class="slider-track" style="height:100%;">
                    @foreach($sliders as $slide)
                    <div class="slider-item" style="height:60vh;">
                        <img src="{{ asset('storage/'.$slide->image_path) }}" alt="{{ $slide->title }}" style="width:100%;height:100%;object-fit:cover;filter:brightness(0.35);">
                    </div>
                    @endforeach
                </div>
                <button class="slider-btn prev"><i class="ri-arrow-left-s-line"></i></button>
                <button class="slider-btn next"><i class="ri-arrow-right-s-line"></i></button>
            </div>
        </div>
        @endif
    </div>
    <div class="hero-content" style="z-index:3;">
        <div class="hero-badge"><i class="ri-briefcase-line"></i> BKK Tinta Emas Indonesia</div>
        <h1 class="hero-title">{{ $contents['hero'][0]->value ?? 'BKK Tinta Emas Indonesia' }}</h1>
        <p class="hero-subtitle">{{ $contents['hero'][1]->value ?? 'Bursa Kerja Khusus yang menghubungkan lulusan terbaik dengan perusahaan mitra terpercaya.' }}</p>
        <div class="hero-actions">
            <a href="#lowongan" class="btn-primary"><i class="ri-search-line"></i> Lihat Lowongan</a>
            <a href="#mitra" class="btn-outline"><i class="ri-building-line"></i> Mitra Industri</a>
        </div>
    </div>
</section>

{{-- STATS --}}
<div style="background:var(--card-bg);border-bottom:1px solid var(--card-border);padding:2rem 0;">
    <div class="container">
        <div class="stats-grid" style="grid-template-columns:repeat(4,1fr);">
            <div class="stat-item reveal" style="text-align:center;">
                <div class="stat-number" data-count="500" data-suffix="+">0</div>
                <div class="stat-label">Alumni Tersalurkan</div>
            </div>
            <div class="stat-item reveal" style="text-align:center;">
                <div class="stat-number" data-count="120" data-suffix="+">0</div>
                <div class="stat-label">Mitra Perusahaan</div>
            </div>
            <div class="stat-item reveal" style="text-align:center;">
                <div class="stat-number" data-count="95" data-suffix="%">0</div>
                <div class="stat-label">Tingkat Penyerapan</div>
            </div>
            <div class="stat-item reveal" style="text-align:center;">
                <div class="stat-number" data-count="30" data-suffix="+">0</div>
                <div class="stat-label">Lowongan Aktif</div>
            </div>
        </div>
    </div>
</div>

{{-- TENTANG BKK --}}
<section class="section" id="tentang">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;" class="reveal">
            <div>
                <div class="section-tag"><i class="ri-briefcase-4-line"></i> Tentang BKK</div>
                <h2 class="section-title" style="text-align:left;margin-top:0.75rem;">{{ $contents['about'][0]->value ?? 'BKK Tinta Emas Indonesia' }}</h2>
                <div class="section-divider" style="margin:1rem 0;"></div>
                <p style="color:var(--text-secondary);line-height:1.9;">{{ $contents['about'][1]->value ?? '' }}</p>
                <div style="margin-top:2rem;display:flex;flex-direction:column;gap:1rem;">
                    @foreach(['Seleksi dan penyaluran tenaga kerja lulusan','Pembinaan karir dan soft skill','Kerjasama aktif dengan DU/DI nasional & multinasional','Informasi lowongan kerja terkini','Pelatihan sebelum penempatan kerja'] as $item)
                    <div style="display:flex;align-items:center;gap:0.75rem;font-size:0.9rem;color:var(--text-secondary);">
                        <i class="ri-checkbox-circle-fill" style="color:var(--accent);font-size:1.1rem;"></i> {{ $item }}
                    </div>
                    @endforeach
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                @foreach([
                    ['🏭','Industri Manufaktur','Puluhan mitra pabrik nasional'],
                    ['🏢','Perusahaan Jasa','Bank, hotel, ritel, dan lebih'],
                    ['💻','Teknologi & IT','Startup hingga perusahaan multinasional'],
                    ['🏗️','Konstruksi & EPC','Proyek infrastruktur nasional'],
                ] as [$icon,$title,$desc])
                <div class="card" style="padding:1.5rem;text-align:center;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">{{ $icon }}</div>
                    <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;margin-bottom:0.25rem;">{{ $title }}</div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);">{{ $desc }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- LOWONGAN KERJA --}}
<section class="section section-alt" id="lowongan">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-briefcase-2-line"></i> Lowongan Kerja</div>
            <h2 class="section-title">Lowongan Kerja Terbaru</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Khusus untuk alumni SMK Tinta Emas Indonesia. Update setiap minggu.</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem;">
            @foreach([
                ['💻','Staff IT & Network Engineer','PT. Teknologi Nusantara','Jakarta Selatan','Rp 5-8 Juta/Bulan','Full Time','TKJ / RPL','Maks. 25 Tahun'],
                ['⚡','Teknisi Listrik','PT. Energi Prima','Bekasi, Jawa Barat','Rp 4-6 Juta/Bulan','Full Time','TITL','Maks. 26 Tahun'],
                ['🔧','Mekanik Kendaraan','PT. Astra Mitra Servis','Depok, Jawa Barat','Rp 4.5-7 Juta/Bulan','Full Time','TKR','Maks. 27 Tahun'],
                ['💰','Staff Accounting','PT. Keuangan Mandiri','Tangerang','Rp 4-6 Juta/Bulan','Full Time','Akuntansi','Maks. 25 Tahun'],
                ['🎨','Desainer Grafis','CV. Creative Studio','Remote / Hybrid','Rp 4-7 Juta/Bulan','Full Time','DKV','Maks. 28 Tahun'],
                ['📦','Operator Produksi','PT. Manufaktur Jaya','Karawang','Rp 3.5-5 Juta/Bulan','Shift Work','Semua Jurusan','Maks. 30 Tahun'],
            ] as [$icon,$pos,$perusahaan,$lokasi,$gaji,$tipe,$jurusan,$usia])
            <div class="card reveal" style="padding:1.75rem;">
                <div style="display:flex;align-items:flex-start;gap:1rem;margin-bottom:1.25rem;">
                    <div style="width:48px;height:48px;border-radius:12px;background:var(--btn-primary);display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">{{ $icon }}</div>
                    <div>
                        <div style="font-weight:800;color:var(--text-primary);font-size:0.95rem;margin-bottom:0.2rem;">{{ $pos }}</div>
                        <div style="font-size:0.85rem;color:var(--accent);font-weight:600;">{{ $perusahaan }}</div>
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.5rem;margin-bottom:1.25rem;">
                    @foreach([
                        ['ri-map-pin-line',$lokasi],
                        ['ri-money-dollar-circle-line',$gaji],
                        ['ri-time-line',$tipe],
                        ['ri-graduation-cap-line','Jurusan: '.$jurusan],
                        ['ri-user-line',$usia],
                    ] as [$ico,$val])
                    <div style="display:flex;align-items:center;gap:0.4rem;font-size:0.8rem;color:var(--text-secondary);">
                        <i class="{{ $ico }}" style="color:var(--accent);font-size:0.9rem;"></i> {{ $val }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('bkk') }}" class="btn-primary" style="width:100%;justify-content:center;font-size:0.88rem;padding:0.6rem;">
                    <i class="ri-send-plane-line"></i> Lamar Sekarang
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MITRA INDUSTRI --}}
<section class="section" id="mitra">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-handshake-line"></i> Mitra Industri</div>
            <h2 class="section-title">120+ Perusahaan Mitra</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Kami bermitra dengan perusahaan-perusahaan terpercaya dari berbagai sektor industri.</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:1rem;" class="reveal">
            @foreach(['Manufaktur','Perbankan','Perhotelan','Teknologi IT','Otomotif','Konstruksi','Retail & FMCG','Logistik','Healthcare','Media & Kreatif','Energi','Telekomunikasi'] as $sektor)
            <div style="background:var(--card-bg);border:1px solid var(--card-border);border-radius:12px;padding:1.25rem;text-align:center;font-size:0.85rem;font-weight:600;color:var(--text-secondary);transition:all 0.2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--card-border)';this.style.color='var(--text-secondary)'">
                {{ $sektor }}
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CARA DAFTAR --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-flow-chart"></i> Cara Daftar</div>
            <h2 class="section-title">Cara Mendaftar Lowongan via BKK</h2>
            <div class="section-divider"></div>
        </div>
        <div class="steps">
            @foreach([
                ['Verifikasi Alumni','Pastikan Anda adalah alumni SMK Tinta Emas Indonesia dan miliki surat keterangan alumni.'],
                ['Hubungi BKK','Datang langsung atau hubungi WhatsApp BKK untuk konsultasi dan info lowongan terkini.'],
                ['Siapkan Dokumen','CV, ijazah, transkrip nilai, sertifikat kompetensi, dan dokumen pendukung lainnya.'],
                ['Seleksi Perusahaan','Ikuti proses seleksi yang diatur oleh perusahaan mitra (tes, wawancara, dsb.).'],
                ['Penempatan Kerja','Setelah diterima, BKK akan membantu proses administrasi penempatan kerja Anda.'],
            ] as $i => [$title,$desc])
            <div class="step reveal">
                <div class="step-num">{{ $i + 1 }}</div>
                <div class="step-title">{{ $title }}</div>
                <div class="step-desc">{{ $desc }}</div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:3rem;" class="reveal">
            <a href="https://wa.me/62XXXXXXXXXXX" target="_blank" class="btn-primary" style="font-size:1rem;">
                <i class="ri-whatsapp-line"></i> Hubungi BKK via WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
