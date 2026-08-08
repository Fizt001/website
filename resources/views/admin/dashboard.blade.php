@extends('layouts.admin')

@section('admin-content')
<div class="admin-page-title">Dashboard</div>
<div class="admin-page-sub">Selamat datang kembali, {{ auth()->user()->name }}! Kelola website Tinta Emas dari sini.</div>

{{-- STAT MINIS --}}
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:2rem;">
    <div class="stat-mini">
        <div class="stat-mini-icon"><i class="ri-image-2-line"></i></div>
        <div><div class="stat-mini-num">{{ $totalSliders }}</div><div class="stat-mini-label">Total Foto Slider</div></div>
    </div>
    <div class="stat-mini">
        <div class="stat-mini-icon" style="background:linear-gradient(135deg,#10b981,#059669);"><i class="ri-palette-line"></i></div>
        <div><div class="stat-mini-num" style="text-transform:capitalize;">{{ $settings['active_theme'] ?? 'aurora' }}</div><div class="stat-mini-label">Tema Aktif</div></div>
    </div>
    <div class="stat-mini">
        <div class="stat-mini-icon" style="background:linear-gradient(135deg,#f59e0b,#d97706);"><i class="ri-user-line"></i></div>
        <div><div class="stat-mini-num">Admin</div><div class="stat-mini-label">Level Akses</div></div>
    </div>
    <div class="stat-mini">
        <div class="stat-mini-icon" style="background:linear-gradient(135deg,#ec4899,#db2777);"><i class="ri-global-line"></i></div>
        <div><div class="stat-mini-num">Aktif</div><div class="stat-mini-label">Status Website</div></div>
    </div>
</div>

{{-- QUICK ACTIONS --}}
<div class="admin-card">
    <div class="admin-card-title"><i class="ri-rocket-line" style="color:var(--accent);"></i> Aksi Cepat</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1rem;">
        <a href="{{ route('admin.themes') }}" class="btn-primary btn-sm" style="display:flex;align-items:center;gap:0.5rem;justify-content:center;text-decoration:none;padding:0.75rem;">
            <i class="ri-palette-line"></i> Ganti Tema Website
        </a>
        <a href="{{ route('admin.sliders') }}" class="btn-outline btn-sm" style="display:flex;align-items:center;gap:0.5rem;justify-content:center;text-decoration:none;padding:0.75rem;">
            <i class="ri-image-add-line"></i> Upload Foto Slider
        </a>
        <a href="{{ route('spmb') }}" target="_blank" class="btn-outline btn-sm" style="display:flex;align-items:center;gap:0.5rem;justify-content:center;text-decoration:none;padding:0.75rem;">
            <i class="ri-external-link-line"></i> Lihat Halaman SPMB
        </a>
        <a href="{{ route('bkk') }}" target="_blank" class="btn-outline btn-sm" style="display:flex;align-items:center;gap:0.5rem;justify-content:center;text-decoration:none;padding:0.75rem;">
            <i class="ri-external-link-line"></i> Lihat Halaman BKK
        </a>
    </div>
</div>

{{-- LOGO UPLOAD --}}
<div class="admin-card">
    <div class="admin-card-title"><i class="ri-image-edit-line" style="color:var(--accent);"></i> Logo & Identitas Website</div>
    <div style="display:flex;flex-direction:column;gap:1.5rem;">
        
        {{-- Logo Yayasan --}}
        <div>
            <div style="font-weight:700;margin-bottom:0.5rem;color:var(--text-primary);font-size:0.9rem;">Logo Yayasan (Utama)</div>
            <form action="{{ route('admin.settings.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="logo_type" value="yayasan">
                <div style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;">
                    @php $siteLogo = \App\Models\Setting::get('site_logo'); @endphp
                    @if($siteLogo)
                        <img src="{{ Storage::url($siteLogo) }}" alt="Logo Yayasan" style="width:48px;height:48px;border-radius:8px;object-fit:contain;background:var(--card-bg);border:1px solid var(--card-border);padding:2px;">
                    @else
                        <div style="width:48px;height:48px;border-radius:8px;background:var(--btn-primary);display:flex;align-items:center;justify-content:center;font-weight:900;font-size:1.1rem;color:white;">TE</div>
                    @endif
                    <div style="flex-grow:1;min-width:200px;">
                        <input type="file" name="logo" accept="image/*" class="form-input" style="width:100%;padding:0.4rem;font-size:0.875rem;" required>
                    </div>
                    <button type="submit" class="btn-primary btn-sm"><i class="ri-upload-2-line"></i> Upload</button>
                </div>
            </form>
        </div>

        {{-- Logo SMK --}}
        <div>
            <div style="font-weight:700;margin-bottom:0.5rem;color:var(--text-primary);font-size:0.9rem;">Logo SMK Tinta Emas</div>
            <form action="{{ route('admin.settings.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="logo_type" value="smk">
                <div style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;">
                    @php $logoSmk = \App\Models\Setting::get('logo_smk'); @endphp
                    @if($logoSmk)
                        <img src="{{ Storage::url($logoSmk) }}" alt="Logo SMK" style="width:48px;height:48px;border-radius:8px;object-fit:contain;background:var(--card-bg);border:1px solid var(--card-border);padding:2px;">
                    @else
                        <div style="width:48px;height:48px;border-radius:8px;background:var(--card-bg);border:1px dashed var(--card-border);display:flex;align-items:center;justify-content:center;font-size:1.2rem;color:var(--text-secondary);"><i class="ri-image-line"></i></div>
                    @endif
                    <div style="flex-grow:1;min-width:200px;">
                        <input type="file" name="logo" accept="image/*" class="form-input" style="width:100%;padding:0.4rem;font-size:0.875rem;" required>
                    </div>
                    <button type="submit" class="btn-primary btn-sm"><i class="ri-upload-2-line"></i> Upload</button>
                </div>
            </form>
        </div>

        {{-- Logo SMP --}}
        <div>
            <div style="font-weight:700;margin-bottom:0.5rem;color:var(--text-primary);font-size:0.9rem;">Logo SMP Tinta Emas</div>
            <form action="{{ route('admin.settings.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="logo_type" value="smp">
                <div style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap;">
                    @php $logoSmp = \App\Models\Setting::get('logo_smp'); @endphp
                    @if($logoSmp)
                        <img src="{{ Storage::url($logoSmp) }}" alt="Logo SMP" style="width:48px;height:48px;border-radius:8px;object-fit:contain;background:var(--card-bg);border:1px solid var(--card-border);padding:2px;">
                    @else
                        <div style="width:48px;height:48px;border-radius:8px;background:var(--card-bg);border:1px dashed var(--card-border);display:flex;align-items:center;justify-content:center;font-size:1.2rem;color:var(--text-secondary);"><i class="ri-image-line"></i></div>
                    @endif
                    <div style="flex-grow:1;min-width:200px;">
                        <input type="file" name="logo" accept="image/*" class="form-input" style="width:100%;padding:0.4rem;font-size:0.875rem;" required>
                    </div>
                    <button type="submit" class="btn-primary btn-sm"><i class="ri-upload-2-line"></i> Upload</button>
                </div>
            </form>
        </div>

    </div>
</div>

{{-- INFO --}}
<div class="admin-card">
    <div class="admin-card-title"><i class="ri-information-line" style="color:var(--accent);"></i> Panduan Admin</div>
    <div style="display:grid;gap:0.875rem;">
        @foreach([
            ['ri-palette-line','Ganti Tema','Buka menu "Pilih Tema" untuk mengganti tampilan website menjadi salah satu dari 3 tema: Aurora Tech, Academic Brilliance, atau Future Edu.'],
            ['ri-image-2-line','Kelola Slider','Buka menu "Kelola Slider" untuk upload foto promosi di setiap halaman (Beranda, SMK, SMP, SPMB, BKK).'],
            ['ri-eye-line','Preview Website','Klik "Lihat Website" di pojok kanan atas untuk melihat tampilan website publik di tab baru.'],
        ] as [$icon,$title,$desc])
        <div style="display:flex;gap:1rem;align-items:flex-start;padding:1rem;border-radius:10px;background:var(--bg-secondary);">
            <div style="width:36px;height:36px;border-radius:8px;background:var(--tag-bg);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="{{ $icon }}" style="color:var(--accent);"></i>
            </div>
            <div>
                <div style="font-weight:700;color:var(--text-primary);font-size:0.9rem;margin-bottom:0.25rem;">{{ $title }}</div>
                <div style="font-size:0.85rem;color:var(--text-secondary);line-height:1.6;">{{ $desc }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
