<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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
        // Enforce Tailwind styling for pagination links across admin & employee dashboards
        Paginator::useTailwind();

        // Enforce HTTPS schema when operating in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
