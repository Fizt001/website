@extends('layouts.admin')

@section('admin-content')
<div class="admin-page-title">Pilih Tema Website</div>
<div class="admin-page-sub">Pilih salah satu dari 3 tema desain untuk tampilan website Anda. Perubahan langsung aktif secara real-time.</div>

@if(session('success'))
<div class="alert alert-success" style="margin-bottom:1.5rem;"><i class="ri-checkbox-circle-fill"></i> {{ session('success') }}</div>
@endif

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:1.75rem;">
    @foreach($themes as $key => $themeData)
    <div class="theme-preview-card {{ $activeTheme === $key ? 'active' : '' }}" style="border-radius:20px;overflow:hidden;border:2px solid {{ $activeTheme === $key ? 'var(--accent)' : 'var(--card-border)' }};transition:all 0.3s;">

        {{-- VISUAL PREVIEW --}}
        <div style="height:200px;position:relative;overflow:hidden;
            @if($key === 'aurora') background:linear-gradient(135deg,#080f1a 0%,#0d1829 50%,#1a0a2e 100%);
            @elseif($key === 'academic') background:linear-gradient(135deg,#1e3a5f 0%,#2d5491 50%,#1a4570 100%);
            @else background:linear-gradient(135deg,#0a0515 0%,#1a0530 50%,#0e1a35 100%);
            @endif">

            @if($key === 'aurora')
            {{-- Aurora Preview Elements --}}
            <div style="position:absolute;top:20px;left:20px;right:20px;">
                <div style="height:6px;border-radius:3px;background:linear-gradient(90deg,#00e5ff,#7c3aed);margin-bottom:12px;width:60%;"></div>
                <div style="height:4px;border-radius:2px;background:rgba(0,229,255,0.2);margin-bottom:8px;width:80%;"></div>
                <div style="height:4px;border-radius:2px;background:rgba(0,229,255,0.15);width:50%;"></div>
            </div>
            <div style="position:absolute;bottom:15px;left:20px;right:20px;display:flex;gap:8px;">
                <div style="height:60px;flex:2;border-radius:10px;background:rgba(0,229,255,0.08);border:1px solid rgba(0,229,255,0.2);display:flex;align-items:center;justify-content:center;font-size:1.5rem;">🌌</div>
                <div style="height:60px;flex:1;border-radius:10px;background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.3);display:flex;align-items:center;justify-content:center;">
                    <div style="width:12px;height:12px;border-radius:50%;background:#00e5ff;box-shadow:0 0 10px #00e5ff;"></div>
                </div>
                <div style="height:60px;flex:1;border-radius:10px;background:rgba(0,229,255,0.06);border:1px solid rgba(0,229,255,0.15);display:flex;align-items:center;justify-content:center;">
                    <div style="width:12px;height:12px;border-radius:50%;background:#7c3aed;box-shadow:0 0 10px #7c3aed;"></div>
                </div>
            </div>
            <div style="position:absolute;top:15px;right:20px;width:60px;height:60px;border-radius:50%;background:rgba(0,229,255,0.05);border:1px solid rgba(0,229,255,0.15);"></div>

            @elseif($key === 'academic')
            {{-- Academic Preview Elements --}}
            <div style="position:absolute;top:0;left:0;right:0;height:5px;background:linear-gradient(90deg,transparent,#d4880a,#f4a71d,#d4880a,transparent);"></div>
            <div style="position:absolute;top:20px;left:20px;right:20px;">
                <div style="height:6px;border-radius:3px;background:#f4a71d;margin-bottom:12px;width:50%;"></div>
                <div style="height:3px;border-radius:2px;background:rgba(255,255,255,0.15);margin-bottom:7px;width:75%;"></div>
                <div style="height:3px;border-radius:2px;background:rgba(255,255,255,0.1);width:40%;"></div>
            </div>
            <div style="position:absolute;bottom:15px;left:20px;right:20px;display:flex;gap:8px;">
                <div style="height:60px;flex:1;border-radius:8px;background:rgba(255,255,255,0.08);border-top:3px solid #f4a71d;display:flex;align-items:center;justify-content:center;font-size:1.3rem;">🏛️</div>
                <div style="height:60px;flex:1;border-radius:8px;background:rgba(255,255,255,0.06);border-top:3px solid rgba(255,255,255,0.3);display:flex;align-items:center;justify-content:center;font-size:1.3rem;">📚</div>
                <div style="height:60px;flex:1;border-radius:8px;background:rgba(212,136,10,0.15);border-top:3px solid #d4880a;display:flex;align-items:center;justify-content:center;font-size:1.3rem;">🎓</div>
            </div>

            @else
            {{-- Future Edu Preview Elements --}}
            <div style="position:absolute;inset:0;background:radial-gradient(circle at 30% 30%,rgba(168,85,247,0.3),transparent 60%),radial-gradient(circle at 70% 70%,rgba(6,182,212,0.2),transparent 60%);"></div>
            <div style="position:absolute;top:20px;left:20px;right:20px;">
                <div style="height:6px;border-radius:3px;background:linear-gradient(90deg,#a855f7,#06b6d4,#ec4899);background-size:200%;margin-bottom:12px;width:65%;"></div>
                <div style="height:3px;border-radius:2px;background:rgba(168,85,247,0.25);margin-bottom:7px;width:80%;"></div>
                <div style="height:3px;border-radius:2px;background:rgba(6,182,212,0.2);width:45%;"></div>
            </div>
            <div style="position:absolute;bottom:15px;left:20px;right:20px;display:flex;gap:8px;">
                <div style="height:60px;flex:2;border-radius:12px;background:rgba(168,85,247,0.1);border:1px solid rgba(168,85,247,0.25);backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;font-size:1.5rem;">🔮</div>
                <div style="height:60px;flex:1;border-radius:12px;background:rgba(6,182,212,0.1);border:1px solid rgba(6,182,212,0.25);backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;font-size:1.3rem;">✨</div>
                <div style="height:60px;flex:1;border-radius:12px;background:rgba(236,72,153,0.1);border:1px solid rgba(236,72,153,0.25);backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;font-size:1.3rem;">💫</div>
            </div>
            @endif

            {{-- Active Badge --}}
            @if($activeTheme === $key)
            <div style="position:absolute;top:12px;right:12px;background:var(--accent);color:var(--bg-primary);padding:0.25rem 0.625rem;border-radius:20px;font-size:0.7rem;font-weight:800;letter-spacing:0.05em;text-transform:uppercase;">
                ✓ Aktif
            </div>
            @endif
        </div>

        {{-- THEME INFO --}}
        <div style="padding:1.5rem;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.75rem;">
                <div style="font-family:var(--font-heading);font-weight:800;font-size:1.1rem;color:var(--text-primary);">{{ $themeData['name'] }}</div>
                <div style="display:flex;gap:4px;">
                    @foreach($themeData['colors'] as $color)
                    <div style="width:16px;height:16px;border-radius:50%;background:{{ $color }};border:2px solid var(--card-border);"></div>
                    @endforeach
                </div>
            </div>
            <div style="font-size:0.8rem;color:var(--accent);font-weight:600;margin-bottom:0.75rem;letter-spacing:0.05em;">{{ $themeData['preview'] }}</div>
            <p style="font-size:0.875rem;color:var(--text-secondary);line-height:1.6;margin-bottom:1.25rem;">{{ $themeData['desc'] }}</p>

            @if($activeTheme === $key)
            <button disabled style="width:100%;padding:0.65rem;border-radius:10px;background:var(--tag-bg);border:1px solid var(--badge-border);color:var(--accent);font-weight:700;font-size:0.875rem;cursor:not-allowed;">
                <i class="ri-checkbox-circle-fill"></i> Tema Aktif Sekarang
            </button>
            @else
            <form action="{{ route('admin.themes.activate') }}" method="POST">
                @csrf
                <input type="hidden" name="theme" value="{{ $key }}">
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;padding:0.65rem;font-size:0.875rem;">
                    <i class="ri-palette-line"></i> Aktifkan Tema Ini
                </button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
</div>

<div class="admin-card" style="margin-top:2rem;">
    <div class="admin-card-title"><i class="ri-lightbulb-line" style="color:var(--accent);"></i> Tips Memilih Tema</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem;">
        <div style="padding:1rem;border-radius:10px;background:var(--bg-secondary);font-size:0.85rem;color:var(--text-secondary);line-height:1.6;">
            <div style="font-weight:700;color:var(--text-primary);margin-bottom:0.35rem;">🌌 Aurora Tech</div>
            Cocok untuk kesan modern dan teknologi. Ideal bila sekolah ingin menonjolkan jurusan IT dan digital.
        </div>
        <div style="padding:1rem;border-radius:10px;background:var(--bg-secondary);font-size:0.85rem;color:var(--text-secondary);line-height:1.6;">
            <div style="font-weight:700;color:var(--text-primary);margin-bottom:0.35rem;">🏛️ Academic Brilliance</div>
            Cocok untuk kesan formal dan akademis. Ideal untuk acara wisuda, rapat dinas, atau presentasi ke dinas pendidikan.
        </div>
        <div style="padding:1rem;border-radius:10px;background:var(--bg-secondary);font-size:0.85rem;color:var(--text-secondary);line-height:1.6;">
            <div style="font-weight:700;color:var(--text-primary);margin-bottom:0.35rem;">🔮 Future Edu</div>
            Cocok untuk kesan kreatif dan inovatif. Ideal saat PPDB, pameran pendidikan, atau menarget siswa muda.
        </div>
    </div>
</div>

{{-- PENGATURAN LATAR BELAKANG HERO --}}
<div class="admin-card" style="margin-top:2rem;">
    <div class="admin-card-title"><i class="ri-image-line" style="color:var(--accent);"></i> Pengaturan Foto Latar Belakang (Semua Halaman)</div>
    <p style="font-size:0.85rem;color:var(--text-secondary);margin-bottom:1.5rem;line-height:1.6;">
        Anda dapat mengunggah foto untuk dijadikan latar belakang di bagian atas (Hero Section) pada semua halaman. Latar belakang warna bawaan tema akan tetap ada, dan foto ini akan menyatu/bertumpuk dengan warna tema sesuai transparansi yang Anda atur.
        <br><strong style="color:var(--text-primary);">Wajib:</strong> Gunakan foto resolusi tinggi, disarankan ukuran <strong style="color:var(--text-primary);">1920x1080 pixel</strong> atau rasio 16:9 (Format JPG/PNG, Max 3MB).
    </p>

    <form action="{{ route('admin.settings.hero') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:flex;flex-wrap:wrap;gap:2rem;">
            <div style="flex:1;min-width:250px;">
                <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Upload Foto Latar Belakang</label>
                <input type="file" name="hero_bg_image" accept="image/png, image/jpeg, image/webp" class="form-input" style="width:100%;margin-bottom:0.5rem;">
                
                @php $currentBg = \App\Models\Setting::get('hero_bg_image'); @endphp
                @if($currentBg)
                    <div style="display:flex;align-items:center;gap:1rem;margin-top:1rem;">
                        <img src="{{ Storage::url($currentBg) }}" style="width:120px;height:67px;object-fit:cover;border-radius:8px;border:1px solid var(--card-border);">
                        <label style="font-size:0.85rem;display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                            <input type="checkbox" name="remove_bg" value="1"> Hapus foto saat ini
                        </label>
                    </div>
                @endif
            </div>

            <div style="flex:1;min-width:250px;">
                @php $currentOpacity = \App\Models\Setting::get('hero_bg_opacity', '0.2'); @endphp
                <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Tingkat Transparansi Foto (0 - 90%)</label>
                <div style="display:flex;align-items:center;gap:1rem;background:rgba(0,0,0,0.2);padding:1rem;border-radius:12px;border:1px solid var(--card-border);">
                    <input type="range" name="hero_bg_opacity" min="0" max="0.9" step="0.1" value="{{ $currentOpacity }}" style="flex:1;" oninput="document.getElementById('opacity-val').innerText = Math.round(this.value * 100) + '%'">
                    <span id="opacity-val" style="font-weight:700;width:40px;text-align:right;font-size:1.1rem;color:var(--accent);">{{ round($currentOpacity * 100) }}%</span>
                </div>
                <div style="font-size:0.8rem;color:var(--text-secondary);margin-top:0.75rem;line-height:1.5;">
                    Geser ke kiri agar foto membaur kuat dengan warna tema (gelap). Geser ke kanan agar foto semakin terlihat jelas.
                </div>
            </div>
        </div>
        
        <div style="margin-top:2rem;display:flex;justify-content:flex-end;">
            <button type="submit" class="btn-primary"><i class="ri-save-line"></i> Simpan Latar Belakang</button>
        </div>
    </form>
</div>

@endsection
