<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $sliders = Slider::orderBy('unit')->orderBy('order')->get()->groupBy('unit');
        return view('admin.sliders', compact('sliders', 'theme'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit'    => 'required|in:home,smk,smp,spmb,bkk',
            'title'   => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:500',
            'image'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $request->file('image')->store('sliders', 'public');
        $lastOrder = Slider::where('unit', $request->unit)->max('order') ?? 0;

        Slider::create([
            'unit'       => $request->unit,
            'title'      => $request->title,
            'caption'    => $request->caption,
            'image_path' => $path,
            'order'      => $lastOrder + 1,
            'is_active'  => true,
        ]);

        return back()->with('success', 'Foto slider berhasil ditambahkan!');
    }

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image_path);
        $slider->delete();
        return back()->with('success', 'Foto slider berhasil dihapus.');
    }
}
