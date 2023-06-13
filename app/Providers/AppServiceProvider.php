<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Filament\Facades\Filament;
use Illuminate\Support\Carbon;

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
        Sanctum::usePersonalAccessTokenModel(\App\Models\PersonalAccessToken::class);

        // Set Carbon Locale
        Carbon::setLocale('id');

        Filament::serving(
            function () {

                

                // Using Vite
                Filament::registerViteTheme('resources/css/app.css');
            }
        );
    }
}
