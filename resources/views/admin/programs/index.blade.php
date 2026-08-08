@extends('layouts.admin')

@section('admin-content')
<div class="admin-page-title" style="text-transform: uppercase;">Kelola Data {{ $unit }}</div>
<div class="admin-page-sub">Manajemen jurusan, ekstrakurikuler, atau program unggulan untuk unit {{ strtoupper($unit) }}</div>

@if(session('success'))
<div style="background:rgba(16,185,129,0.1);color:#059669;padding:1rem;border-radius:12px;margin-bottom:1.5rem;border:1px solid rgba(16,185,129,0.2);">
    <i class="ri-checkbox-circle-fill"></i> {{ session('success') }}
</div>
@endif

<div class="admin-card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
        <div class="admin-card-title" style="margin-bottom:0;"><i class="ri-list-check" style="color:var(--accent);"></i> Daftar Program</div>
        <a href="{{ route('admin.programs.create', ['unit' => $unit]) }}" class="btn-primary btn-sm" style="text-decoration:none;">
            <i class="ri-add-line"></i> Tambah Program
        </a>
    </div>

    @if($programs->count() > 0)
    <div style="display:grid;gap:1rem;">
        @foreach($programs as $program)
        <div style="border:1px solid var(--card-border);border-radius:12px;padding:1.25rem;display:flex;justify-content:space-between;align-items:center;background:var(--bg-primary);">
            <div style="display:flex;align-items:center;gap:1.5rem;">
                <div style="width:48px;height:48px;border-radius:12px;background:rgba(0,0,0,0.05);display:flex;align-items:center;justify-content:center;font-size:1.5rem;">
                    {{ $program->icon ?? '🎓' }}
                </div>
                <div>
                    <div style="font-weight:700;color:var(--text-primary);font-size:1.1rem;margin-bottom:0.25rem;">{{ $program->title }}</div>
                    <div style="font-size:0.85rem;color:var(--text-secondary);display:flex;gap:1rem;">
                        <span><i class="ri-price-tag-3-line"></i> {{ ucfirst($program->type) }}</span>
                        <span><i class="ri-image-2-line"></i> {{ $program->galleries->count() }} Foto Galeri</span>
                    </div>
                </div>
            </div>
            <div style="display:flex;gap:0.5rem;">
                <a href="{{ route('admin.programs.edit', $program) }}" class="btn-outline btn-sm" style="text-decoration:none;"><i class="ri-edit-line"></i> Edit</a>
                <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini beserta seluruh fotonya?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-outline btn-sm" style="color:#ef4444;border-color:#fca5a5;"><i class="ri-delete-bin-line"></i></button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div style="text-align:center;padding:3rem 1rem;color:var(--text-secondary);">
        <i class="ri-inbox-line" style="font-size:3rem;color:var(--card-border);margin-bottom:1rem;"></i>
        <div>Belum ada program untuk unit ini.</div>
    </div>
    @endif
</div>
@endsection
