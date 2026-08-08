<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Override the 'public' disk URL to point to /uploads/
        // This bypasses the need for symlinks on LiteSpeed shared hosting
        config(['filesystems.disks.public.url' => rtrim(config('app.url'), '/') . '/uploads']);
    }
}
