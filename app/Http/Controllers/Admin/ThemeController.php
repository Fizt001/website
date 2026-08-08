<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $activeTheme = Setting::get('active_theme', 'aurora');
        $themes = [
            'aurora' => [
                'name' => 'Aurora Tech',
                'desc' => 'Dark futuristik dengan efek neon glow, partikel animasi, dan nuansa teknologi masa depan.',
                'colors' => ['#0D1B2A', '#00F5FF', '#7C3AED'],
                'preview' => 'Dark · Neon · Futuristik',
            ],
            'academic' => [
                'name' => 'Academic Brilliance',
                'desc' => 'Tampilan profesional dan bersih dengan warna biru akademis dan aksen emas yang elegan.',
                'colors' => ['#1E3A5F', '#F4A71D', '#FFFFFF'],
                'preview' => 'Bersih · Profesional · Formal',
            ],
            'future' => [
                'name' => 'Future Edu',
                'desc' => 'Glassmorphism vivid dengan gradien mesh, frosted glass, dan tipografi tebal yang memukau.',
                'colors' => ['#6C2BD9', '#0EA5E9', '#EC4899'],
                'preview' => 'Glassmorphism · Vivid · Modern',
            ],
        ];
        return view('admin.themes', compact('activeTheme', 'themes'));
    }

    public function activate(Request $request)
    {
        $request->validate(['theme' => 'required|in:aurora,academic,future']);
        Setting::set('active_theme', $request->theme);
        return back()->with('success', 'Tema berhasil diaktifkan!');
    }

    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'logo_type' => 'required|in:yayasan,smk,smp'
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $key = 'site_logo';
            if ($request->logo_type === 'smk') $key = 'logo_smk';
            if ($request->logo_type === 'smp') $key = 'logo_smp';
            Setting::set($key, $path);
        }

        return back()->with('success', 'Logo berhasil diperbarui!');
    }

    public function uploadHeroBg(Request $request)
    {
        $request->validate([
            'hero_bg_image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:3072',
            'hero_bg_opacity' => 'required|numeric|min:0|max:0.9',
        ]);

        if ($request->hasFile('hero_bg_image')) {
            $path = $request->file('hero_bg_image')->store('backgrounds', 'public');
            Setting::set('hero_bg_image', $path);
        }

        Setting::set('hero_bg_opacity', $request->hero_bg_opacity);

        if ($request->has('remove_bg')) {
            Setting::set('hero_bg_image', null);
        }

        return back()->with('success', 'Latar belakang utama berhasil diperbarui!');
    }
}
