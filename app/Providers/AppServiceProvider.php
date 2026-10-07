<?php

namespace App\Providers;

use App\Models\AboutPage;
use App\Models\RestaurantProfile;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
{
    if (config('app.env') === 'production') {
    \Illuminate\Support\Facades\URL::forceScheme('https');
    }

    Paginator::useBootstrapFive();

    View::composer('*', function ($view) {
        $view->with([
            'profile' => RestaurantProfile::first(),
            'settings' => Setting::pluck('value', 'key'),
            'about' => AboutPage::first(),
        ]);
    });
}
}