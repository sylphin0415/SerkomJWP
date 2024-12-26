<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\SaleObserver;
use App\Models\Sale;

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
        Sale::observe(SaleObserver::class);
    }
}
