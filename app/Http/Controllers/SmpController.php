<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\Slider;

class SmpController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $settings = Setting::all()->pluck('value', 'key');
        $sliders = Slider::unit('smp')->get();
        $contents = Content::where('unit', 'smp')->get()->groupBy('section');
        $programs = \App\Models\Program::with('galleries')->where('unit', 'smp')->get();
        return view('smp.index', compact('theme', 'settings', 'sliders', 'contents', 'programs'));
    }
}
