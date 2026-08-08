<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Content;

class DashboardController extends Controller
{
    public function index()
    {
        $theme = Setting::get('active_theme', 'aurora');
        $totalSliders = Slider::count();
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.dashboard', compact('theme', 'totalSliders', 'settings'));
    }
}
