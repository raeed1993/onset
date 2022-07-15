<?php

namespace App\Providers;

use App\Composer\AdminLayoutComposer;
use App\Composer\LayoutComposer;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layout.master', AdminLayoutComposer::class);
        View::composer('layouts.app', LayoutComposer::class);
        View::composer('pages.home', LayoutComposer::class);
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
