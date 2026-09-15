<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

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
        // Make site settings (logo, address, phone, email, socials) available
        // to the header/footer on every frontend page without every
        // controller having to pass it manually.
        View::composer(['frontend.layouts.header', 'frontend.layouts.footer', 'frontend.layouts.mobile_menu'], function ($view) {
            $view->with('global_setting', Setting::first());
        });
    }
}
