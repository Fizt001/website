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
}
