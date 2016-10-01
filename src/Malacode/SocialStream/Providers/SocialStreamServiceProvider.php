<?php

namespace Malacode\SocialStream\Providers;

use Illuminate\Support\ServiceProvider;

class SocialStreamServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__.'/../../../../resources/views', 'social_stream');

        // Load translation
        $this->loadTranslationsFrom(__DIR__.'/../../../../resources/lang', 'social_stream');

        // Call pblish redources function
        $this->publishResources();

        include __DIR__.'/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('social_stream', function ($app) {
            return $this->app->make('Malacode\SocialStream\SocialStream');
        });

        // Repository binds
        // Bind SocialWall to repository
        $this->app->bind(
            \Malacode\SocialStream\Interfaces\SocialWallRepositoryInterface::class,
            \Malacode\SocialStream\Repositories\Eloquent\SocialWallRepository::class
        );
        // Bind SocialWallCategory to repository
        $this->app->bind(
            \Malacode\SocialStream\Interfaces\SocialWallCategoryRepositoryInterface::class,
            \Malacode\SocialStream\Repositories\Eloquent\SocialWallCategoryRepository::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['social_stream'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__.'/../../../../config/config.php' => config_path('package/social_stream.php')], 'config');

        // Publish public view
        $this->publishes([__DIR__.'/../../../../resources/views/public'  => base_path('resources/views/vendor/social_stream/public')], 'view-public');

        // Publish admin view
        $this->publishes([__DIR__.'/../../../../resources/views/admin' => base_path('resources/views/vendor/social_stream/admin')], 'view-admin');

        // Publish language files
        $this->publishes([__DIR__.'/../../../../resources/lang' => base_path('resources/lang/vendor/courier')], 'lang');
        
        // Publish JS CSS needed for current app
        $this->publishes([__DIR__.'/../../../../resources/assets' => base_path('public/vendor/social_stream')], 'assets');

        // Publish migrations
        $this->publishes([__DIR__.'/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__.'/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');
    }
}
