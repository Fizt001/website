@extends('layouts.app')
@section('title', 'SPMB Tinta Emas Indonesia')
@section('meta_desc', 'Sistem Penerimaan Murid Baru SPMB Tinta Emas Indonesia — Daftar online mudah, transparan, dan terpercaya.')

@section('content')

{{-- HERO --}}
<section class="hero" id="beranda" style="min-height:60vh;">
    <div class="hero-bg">
        <div class="hero-orb hero-orb-1" style="background:rgba(194,65,12,0.12);"></div>
        <canvas id="particles-canvas"></canvas>
        @if($sliders->count() > 0)
        <div style="position:absolute;inset:0;">
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
        <div class="hero-badge"><i class="ri-file-text-line"></i> SPMB Tinta Emas Indonesia</div>
        <h1 class="hero-title">{{ $contents['hero'][0]->value ?? 'SPMB Tinta Emas Indonesia' }}</h1>
        <p class="hero-subtitle">{{ $contents['hero'][1]->value ?? 'Daftar online mudah, transparan, dan terpercaya untuk tahun ajaran baru.' }}</p>
        <div class="hero-actions">
            <a href="#daftar" class="btn-primary"><i class="ri-user-add-line"></i> Daftar Online</a>
            <a href="#jadwal" class="btn-outline"><i class="ri-calendar-line"></i> Lihat Jadwal</a>
        </div>
    </div>
</section>

{{-- JADWAL & INFO --}}
<section class="section" id="jadwal">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-calendar-check-line"></i> Jadwal SPMB</div>
            <h2 class="section-title">Jadwal Penerimaan Murid Baru {{ $contents['info']['year']->value ?? '2025/2026' }}</h2>
            <div class="section-divider"></div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.5rem;" class="reveal">
            @foreach([
                ['ri-door-open-line','Pembukaan Pendaftaran',$contents['info']['open_date']->value ?? '1 Juli 2025','Mulai menerima berkas pendaftaran'],
                ['ri-door-closed-line','Penutupan Pendaftaran',$contents['info']['close_date']->value ?? '31 Agustus 2025','Batas akhir pengumpulan berkas'],
                ['ri-megaphone-line','Pengumuman Hasil',$contents['info']['announcement']->value ?? '5 September 2025','Pengumuman resmi peserta diterima'],
                ['ri-pen-nib-line','Daftar Ulang',$contents['info']['register_date']->value ?? '8–12 September 2025','Daftar ulang & pembayaran awal'],
            ] as [$icon,$label,$date,$desc])
            <div class="card" style="text-align:center;padding:2rem;">
                <div style="width:52px;height:52px;border-radius:14px;background:var(--btn-primary);display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:1.4rem;color:white;">
                    <i class="{{ $icon }}"></i>
                </div>
                <div style="font-weight:700;color:var(--text-primary);margin-bottom:0.35rem;font-size:0.92rem;">{{ $label }}</div>
                <div style="color:var(--accent);font-weight:800;font-size:1.05rem;margin-bottom:0.5rem;">{{ $date }}</div>
                <div style="font-size:0.82rem;color:var(--text-secondary);">{{ $desc }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ALUR PENDAFTARAN --}}
<section class="section section-alt" id="alur">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-flow-chart"></i> Alur Pendaftaran</div>
            <h2 class="section-title">Cara Mendaftar</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Ikuti langkah-langkah berikut untuk mendaftar sebagai peserta didik baru.</p>
        </div>
        <div class="steps">
            @foreach([
                ['Isi Formulir Online','Lengkapi formulir pendaftaran online di halaman ini dengan data yang benar dan akurat.'],
                ['Lengkapi Berkas','Siapkan dan upload dokumen: Ijazah/SKL, KK, Akte Kelahiran, dan pas foto.'],
                ['Verifikasi Data','Tim kami akan memverifikasi berkas dalam 1x24 jam kerja dan menghubungi Anda.'],
                ['Tes Seleksi','Ikuti tes seleksi akademik dan wawancara sesuai jadwal yang ditentukan.'],
                ['Pengumuman','Cek hasil seleksi pada tanggal pengumuman yang telah ditentukan.'],
                ['Daftar Ulang','Peserta yang diterima melakukan daftar ulang dan pembayaran awal di sekolah.'],
            ] as $i => [$title,$desc])
            <div class="step reveal">
                <div class="step-num">{{ $i + 1 }}</div>
                <div class="step-title">{{ $title }}</div>
                <div class="step-desc">{{ $desc }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PERSYARATAN --}}
<section class="section" id="persyaratan">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;" class="reveal">
            <div>
                <div class="section-tag"><i class="ri-file-list-line"></i> Persyaratan</div>
                <h2 class="section-title" style="text-align:left;margin-top:0.75rem;">Persyaratan Pendaftaran</h2>
                <div class="section-divider" style="margin:1rem 0;"></div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-top:1.5rem;">
                    <div>
                        <div style="font-weight:700;color:var(--accent);margin-bottom:1rem;font-size:0.95rem;">📋 Masuk SMK</div>
                        @foreach(['Ijazah/SKL SMP/MTs','Nilai rapor kelas 7-9','Kartu Keluarga (KK)','Akte Kelahiran','Pas foto 3x4 (6 lembar)','NISN'] as $item)
                        <div style="display:flex;gap:0.5rem;margin-bottom:0.6rem;font-size:0.88rem;color:var(--text-secondary);">
                            <i class="ri-check-line" style="color:var(--accent);"></i> {{ $item }}
                        </div>
                        @endforeach
                    </div>
                    <div>
                        <div style="font-weight:700;color:var(--accent);margin-bottom:1rem;font-size:0.95rem;">📋 Masuk SMP</div>
                        @foreach(['Ijazah/SKL SD/MI','Nilai rapor kelas 4-6','Kartu Keluarga (KK)','Akte Kelahiran','Pas foto 3x4 (6 lembar)','NISN'] as $item)
                        <div style="display:flex;gap:0.5rem;margin-bottom:0.6rem;font-size:0.88rem;color:var(--text-secondary);">
                            <i class="ri-check-line" style="color:var(--accent);"></i> {{ $item }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <div class="section-tag"><i class="ri-question-answer-line"></i> FAQ</div>
                <h2 class="section-title" style="text-align:left;margin-top:0.75rem;">Pertanyaan Umum</h2>
                <div class="section-divider" style="margin:1rem 0;"></div>
                @foreach([
                    ['Apakah ada biaya pendaftaran?','Pendaftaran awal GRATIS. Biaya hanya dikenakan setelah dinyatakan diterima dan melakukan daftar ulang.'],
                    ['Berapa kuota yang tersedia?','Tersedia ±200 kursi untuk SMK dan ±150 kursi untuk SMP per tahun ajaran.'],
                    ['Apakah ada beasiswa?','Ya! Tersedia beasiswa prestasi, beasiswa tidak mampu, dan beasiswa penuh untuk siswa berprestasi.'],
                    ['Kapan ujian seleksi dilaksanakan?','Ujian seleksi dilaksanakan setelah verifikasi berkas selesai, peserta akan dihubungi via WhatsApp.'],
                ] as [$q,$a])
                <div style="margin-bottom:1.25rem;">
                    <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;margin-bottom:0.4rem;"><i class="ri-question-line" style="color:var(--accent);"></i> {{ $q }}</div>
                    <div style="font-size:0.85rem;color:var(--text-secondary);line-height:1.7;padding-left:1.4rem;">{{ $a }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- FORM PENDAFTARAN --}}
<section class="section section-alt" id="daftar">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-tag"><i class="ri-user-add-line"></i> Form Pendaftaran</div>
            <h2 class="section-title">Daftar Online Sekarang</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda.</p>
        </div>
        <div style="max-width:640px;margin:0 auto;" class="reveal">
            @if(session('success'))
            <div class="alert alert-success"><i class="ri-checkbox-circle-fill"></i> {{ session('success') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-error"><i class="ri-error-warning-fill"></i> {{ $errors->first() }}</div>
            @endif
            <form action="{{ route('spmb.submit') }}" method="POST" class="card" style="padding:2.5rem;">
                @csrf
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;">
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Nama Lengkap Calon Siswa *</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap sesuai akte" required value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asal Sekolah *</label>
                        <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama sekolah asal" required value="{{ old('asal_sekolah') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Unit yang Dituju *</label>
                        <select name="unit_pilihan" class="form-control form-select" required>
                            <option value="">-- Pilih Unit --</option>
                            <option value="smk" {{ old('unit_pilihan')=='smk'?'selected':'' }}>SMK Tinta Emas Indonesia</option>
                            <option value="smp" {{ old('unit_pilihan')=='smp'?'selected':'' }}>SMP Tinta Emas Indonesia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. WhatsApp *</label>
                        <input type="tel" name="telepon" class="form-control" placeholder="08xx xxxx xxxx" required value="{{ old('telepon') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="email@contoh.com" required value="{{ old('email') }}">
                    </div>
                </div>
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;margin-top:0.5rem;font-size:1rem;">
                    <i class="ri-send-plane-line"></i> Kirim Formulir Pendaftaran
                </button>
                <p style="text-align:center;font-size:0.8rem;color:var(--text-secondary);margin-top:1rem;">
                    🔒 Data Anda aman dan terlindungi. Tidak akan disebarkan kepada pihak ketiga.
                </p>
            </form>
        </div>
    </div>
</section>

@endsection
