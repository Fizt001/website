@php
    $heroBgImage = \App\Models\Setting::get('hero_bg_image');
    $heroBgOpacity = \App\Models\Setting::get('hero_bg_opacity', '0.2');
@endphp
@if($heroBgImage)
    <div style="position:absolute;inset:0;background-image:url('{{ Storage::url($heroBgImage) }}');background-size:cover;background-position:center;opacity:{{ $heroBgOpacity }};mix-blend-mode:normal;z-index:1;"></div>
@endif
