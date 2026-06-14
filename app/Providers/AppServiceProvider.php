<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        $locale = Session::get('locale', config('app.locale', 'fr'));
        if (in_array($locale, ['en', 'fr', 'ar'])) {
            App::setLocale($locale);
        }
    }
}
