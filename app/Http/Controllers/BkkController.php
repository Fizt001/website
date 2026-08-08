<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\Slider;

class BkkController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $settings = Setting::all()->pluck('value', 'key');
        $sliders = Slider::unit('bkk')->get();
        $contents = Content::where('unit', 'bkk')->get()->groupBy('section');
        return view('bkk.index', compact('theme', 'settings', 'sliders', 'contents'));
    }
}
