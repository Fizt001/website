<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SmkController;
use App\Http\Controllers\SmpController;
use App\Http\Controllers\SpmbController;
use App\Http\Controllers\BkkController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\SliderController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/smk', [SmkController::class, 'index'])->name('smk');
Route::get('/smp', [SmpController::class, 'index'])->name('smp');
Route::get('/spmb', [SpmbController::class, 'index'])->name('spmb');
Route::post('/spmb/daftar', [SpmbController::class, 'submit'])->name('spmb.submit')->middleware('throttle:5,1');
Route::get('/bkk', [BkkController::class, 'index'])->name('bkk');

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Admin routes (protected)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/themes', [ThemeController::class, 'index'])->name('themes');
    Route::post('/themes/activate', [ThemeController::class, 'activate'])->name('themes.activate');
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');
    Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
});
