<?php

namespace Modules\Taxonomy\Providers;


use Illuminate\Support\ServiceProvider;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Blog\BlogInterface;
use Modules\Taxonomy\Interfaces\Client\ClientInterface;
use Modules\Taxonomy\Interfaces\Meta\MetaInterface;
use Modules\Taxonomy\Interfaces\Portfolio\ProjectInterface;
use Modules\Taxonomy\Interfaces\Service\ServiceInterface;
use Modules\Taxonomy\Interfaces\Slider\SliderInterface;
use Modules\Taxonomy\Interfaces\Website\WebsiteInterface;
use Modules\Taxonomy\Repositories\Blog\BlogRepository;
use Modules\Taxonomy\Repositories\Client\ClientRepository;
use Modules\Taxonomy\Repositories\Meta\MetaRepository;
use Modules\Taxonomy\Repositories\Portfolio\ProjectRepository;
use Modules\Taxonomy\Repositories\Service\ServiceRepository;
use Modules\Taxonomy\Repositories\Website\WebsiteRepository;
use Modules\Taxonomy\Repositories\Slider\SliderRepository;

class TaxonomyServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Taxonomy';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'taxonomy';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(SliderInterface::class, function ($app) {
            return new SliderRepository(new Taxonomy);
        });

        $this->app->singleton(BlogInterface::class, function ($app) {
            return new BlogRepository(new Taxonomy);
        });

        $this->app->singleton(ProjectInterface::class, function ($app) {
            return new ProjectRepository(new Taxonomy);
        });

        $this->app->singleton(MetaInterface::class, function ($app) {
            return new MetaRepository(new Taxonomy);
        });

        $this->app->singleton(ServiceInterface::class, function ($app) {
            return new ServiceRepository(new Taxonomy);
        });

        $this->app->singleton(ClientInterface::class, function ($app) {
            return new ClientRepository(new Taxonomy);
        });
        $this->app->singleton(WebsiteInterface::class, function ($app) {
            return new WebsiteRepository(new Taxonomy);
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
