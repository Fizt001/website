<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\Slider;

class SmkController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $settings = Setting::all()->pluck('value', 'key');
        $sliders = Slider::unit('smk')->get();
        $contents = Content::where('unit', 'smk')->get()->groupBy('section');
        return view('smk.index', compact('theme', 'settings', 'sliders', 'contents'));
    }
}
