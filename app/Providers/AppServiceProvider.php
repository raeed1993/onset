<?php

namespace App\Providers;

use App\Composer\AdminLayoutComposer;
use App\Composer\LayoutComposer;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\RepositoryInterface;
use Modules\Taxonomy\Repositories\ClientBig\ClientBigRepository;

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

        $this->app->singleton(RepositoryInterface::class, function ($app) {
            return new ClientBigRepository(new Taxonomy);
        });

    }
}
