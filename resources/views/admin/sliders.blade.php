@extends('layouts.admin')

@section('admin-content')
<div class="admin-page-title">Kelola Foto Slider</div>
<div class="admin-page-sub">Upload dan kelola foto slider untuk setiap halaman website. Foto digunakan sebagai media promosi sekolah.</div>

@if(session('success'))
<div class="alert alert-success"><i class="ri-checkbox-circle-fill"></i> {{ session('success') }}</div>
@endif
@if($errors->any())
<div class="alert alert-error"><i class="ri-error-warning-fill"></i> {{ $errors->first() }}</div>
@endif

{{-- UPLOAD FORM --}}
<div class="admin-card">
    <div class="admin-card-title"><i class="ri-image-add-line" style="color:var(--accent);"></i> Upload Foto Baru</div>
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:1rem;align-items:end;">
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Halaman / Unit *</label>
                <select name="unit" class="form-control form-select" required>
                    <option value="">-- Pilih Halaman --</option>
                    <option value="home">🏠 Beranda (Landing Page)</option>
                    <option value="smk">🎓 SMK</option>
                    <option value="smp">📚 SMP</option>
                    <option value="spmb">📝 SPMB</option>
                    <option value="bkk">💼 BKK</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Judul (opsional)</label>
                <input type="text" name="title" class="form-control" placeholder="Judul foto slider">
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">File Foto * (jpg/png/webp, maks 2MB)</label>
                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp" required>
            </div>
            <div>
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;padding:0.75rem;">
                    <i class="ri-upload-cloud-2-line"></i> Upload Foto
                </button>
            </div>
        </div>
        <div style="margin-top:1rem;">
            <label class="form-label">Keterangan / Caption (opsional)</label>
            <input type="text" name="caption" class="form-control" placeholder="Deskripsi singkat foto ini">
        </div>
    </form>
</div>

{{-- SLIDER LIST BY UNIT --}}
@php $unitLabels = ['home'=>'🏠 Beranda','smk'=>'🎓 SMK','smp'=>'📚 SMP','spmb'=>'📝 SPMB','bkk'=>'💼 BKK']; @endphp

@foreach($unitLabels as $unitKey => $unitLabel)
@php $unitSliders = $sliders->get($unitKey, collect()); @endphp
<div class="admin-card">
    <div class="admin-card-title">
        <span>{{ $unitLabel }}</span>
        <span style="background:var(--tag-bg);color:var(--accent);padding:0.2rem 0.6rem;border-radius:20px;font-size:0.75rem;font-weight:700;margin-left:auto;">{{ $unitSliders->count() }} foto</span>
    </div>

    @if($unitSliders->isEmpty())
    <div style="text-align:center;padding:2.5rem;color:var(--text-secondary);background:var(--bg-secondary);border-radius:12px;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">🖼️</div>
        <div style="font-size:0.875rem;">Belum ada foto slider untuk halaman ini.</div>
        <div style="font-size:0.8rem;margin-top:0.25rem;opacity:0.7;">Upload foto di atas untuk menampilkan slider di halaman {{ $unitLabel }}.</div>
    </div>
    @else
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:1rem;">
        @foreach($unitSliders as $slider)
        <div style="border-radius:12px;overflow:hidden;border:1px solid var(--card-border);position:relative;background:var(--bg-secondary);">
            <img src="{{ asset('storage/'.$slider->image_path) }}" alt="{{ $slider->title }}" style="width:100%;height:130px;object-fit:cover;display:block;">
            <div style="padding:0.75rem;">
                @if($slider->title)
                <div style="font-size:0.82rem;font-weight:600;color:var(--text-primary);margin-bottom:0.2rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $slider->title }}</div>
                @endif
                @if($slider->caption)
                <div style="font-size:0.75rem;color:var(--text-secondary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $slider->caption }}</div>
                @endif
                <div style="margin-top:0.625rem;">
                    <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="width:100%;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.25);color:#ef4444;padding:0.4rem;border-radius:7px;font-size:0.78rem;font-weight:600;cursor:pointer;transition:all 0.2s;" onmouseover="this.style.background='rgba(239,68,68,0.2)'" onmouseout="this.style.background='rgba(239,68,68,0.1)'">
                            <i class="ri-delete-bin-line"></i> Hapus Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endforeach

@endsection
