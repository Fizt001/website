@extends('layouts.admin')

@section('admin-content')
<div class="admin-page-title" style="text-transform: uppercase;">
    {{ isset($program) ? 'Edit Program: ' . $program->title : 'Tambah Program ' . strtoupper($unit) }}
</div>
<div class="admin-page-sub">Isi detail form di bawah ini.</div>

@if($errors->any())
<div style="background:rgba(239,68,68,0.1);color:#b91c1c;padding:1rem;border-radius:12px;margin-bottom:1.5rem;border:1px solid rgba(239,68,68,0.2);">
    <ul style="margin:0;padding-left:1.5rem;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ isset($program) ? route('admin.programs.update', $program) : route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($program)) @method('PUT') @endif
    
    <input type="hidden" name="unit" value="{{ $unit }}">

    <div class="admin-card">
        <div class="admin-card-title"><i class="ri-file-info-line" style="color:var(--accent);"></i> Informasi Dasar</div>
        
        <div style="display:grid;gap:1.25rem;">
            <div>
                <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Tipe Program</label>
                <select name="type" class="form-input" required>
                    <option value="jurusan" {{ (old('type', $program->type ?? '') == 'jurusan') ? 'selected' : '' }}>Jurusan / Program Keahlian</option>
                    <option value="ekskul" {{ (old('type', $program->type ?? '') == 'ekskul') ? 'selected' : '' }}>Ekstrakurikuler</option>
                    <option value="unggulan" {{ (old('type', $program->type ?? '') == 'unggulan') ? 'selected' : '' }}>Program Unggulan</option>
                    <option value="mitra" {{ (old('type', $program->type ?? '') == 'mitra') ? 'selected' : '' }}>Mitra / Loker (BKK)</option>
                </select>
            </div>
            
            <div style="display:flex;flex-wrap:wrap;gap:1rem;align-items:flex-start;">
                <div style="flex:0 0 100px;">
                    <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Ikon Emoji</label>
                    <input type="text" name="icon" class="form-input" style="text-align:center;font-size:1.5rem;padding:0.5rem;width:100%;" value="{{ old('icon', $program->icon ?? '🎓') }}" title="Gunakan emoji sebagai fallback jika logo tidak diunggah">
                </div>
                <div style="flex:0 0 200px;">
                    <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Logo (Gambar)</label>
                    <input type="file" name="image_icon" class="form-input" accept="image/*" style="width:100%;padding:0.35rem;font-size:0.85rem;">
                    @if(isset($program) && $program->image_icon)
                        <div style="margin-top:0.5rem;font-size:0.8rem;color:var(--text-secondary);">
                            <img src="{{ Storage::url($program->image_icon) }}" style="height:32px;object-fit:contain;border-radius:4px;">
                        </div>
                    @endif
                </div>
                <div style="flex:1;min-width:200px;">
                    <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Nama Program</label>
                    <input type="text" name="title" class="form-input" style="width:100%;" value="{{ old('title', $program->title ?? '') }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                </div>
            </div>

            <div>
                <label style="display:block;margin-bottom:0.5rem;font-weight:600;font-size:0.9rem;">Deskripsi Singkat</label>
                <textarea name="description" class="form-input" style="width:100%;" rows="3" placeholder="Penjelasan singkat mengenai program ini..." required>{{ old('description', $program->description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-title"><i class="ri-image-2-line" style="color:var(--accent);"></i> Galeri Foto (Opsional)</div>
        <p style="font-size:0.85rem;color:var(--text-secondary);margin-bottom:1rem;">Anda dapat mengunggah beberapa foto sekaligus. Format JPG/PNG max 2MB per foto.</p>
        
        <input type="file" name="galleries[]" accept="image/*" class="form-input" multiple>
        
        @if(isset($program) && $program->galleries->count() > 0)
        <div style="margin-top:1.5rem;">
            <div style="font-weight:600;font-size:0.9rem;margin-bottom:1rem;">Foto yang sudah ada:</div>
            <div style="display:flex;flex-wrap:wrap;gap:1rem;">
                @foreach($program->galleries as $gallery)
                <div style="position:relative;width:120px;height:120px;border-radius:12px;overflow:hidden;border:1px solid var(--card-border);">
                    <img src="{{ Storage::url($gallery->image_path) }}" style="width:100%;height:100%;object-fit:cover;">
                    <button type="button" onclick="deleteGallery({{ $gallery->id }})" style="position:absolute;top:5px;right:5px;background:rgba(239,68,68,0.9);color:white;border:none;border-radius:50%;width:28px;height:28px;cursor:pointer;display:flex;align-items:center;justify-content:center;"><i class="ri-delete-bin-line"></i></button>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    
    <div style="display:flex;gap:1rem;margin-top:2rem;">
        <button type="submit" class="btn-primary"><i class="ri-save-line"></i> Simpan Data</button>
        <a href="{{ route('admin.programs.index', ['unit' => $unit]) }}" class="btn-outline" style="text-decoration:none;"><i class="ri-arrow-left-line"></i> Kembali</a>
    </div>
</form>

@if(isset($program) && $program->galleries->count() > 0)
<!-- Script / Form untuk delete gallery spesifik -->
<div style="display:none;">
    @foreach($program->galleries as $gallery)
    <form id="delete-gallery-{{ $gallery->id }}" action="{{ route('admin.programs.gallery.destroy', $gallery) }}" method="POST">
        @csrf @method('DELETE')
    </form>
    @endforeach
</div>
<script>
    function deleteGallery(id) {
        if(confirm('Yakin hapus foto ini?')) {
            document.getElementById('delete-gallery-' + id).submit();
        }
    }
</script>
@endif
@endsection
