<?php

namespace App\Providers;

use App\Models\MenuItems;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $menuItems = MenuItems::where('status', 'Enable')->get();
        view()->share('menuItems', $menuItems);
    }
}
