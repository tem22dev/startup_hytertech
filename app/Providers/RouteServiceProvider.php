<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
/**
     * The path to the "home" route for your application.
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     */

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::namespace($this->namespace)
                ->group(base_path('routes/mobile.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
        // Cấu hình giới hạn tần suất (rate limiting) nếu cần
    }
}
