<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\Slider;

class SpmbController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $settings = Setting::all()->pluck('value', 'key');
        $sliders = Slider::unit('spmb')->get();
        $contents = Content::where('unit', 'spmb')->get()->groupBy('section');
        return view('spmb.index', compact('theme', 'settings', 'sliders', 'contents'));
    }

    public function submit(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'unit_pilihan' => 'required|in:smk,smp',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // For now, just flash success - in production connect to DB
        return back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera. Pastikan nomor telepon aktif.');
    }
}
