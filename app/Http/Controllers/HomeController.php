<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $settings = Setting::all()->pluck('value', 'key');
        $sliders = Slider::unit('home')->get();
        $contents = Content::where('unit', 'home')->get()->groupBy('section');
        return view('home.index', compact('theme', 'settings', 'sliders', 'contents'));
    }
}
