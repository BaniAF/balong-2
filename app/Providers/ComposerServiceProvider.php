<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Proker;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts.navbar', function ($view) {
            $view->with('programs', Proker::all()); // Mengambil semua data program
        });
    }
}
