<?php

namespace Ignite;

use Ignite\Controllers\IgniteAssetsController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Define alias component mapping.
     *
     * @var array
     */
    protected $components = [

        // Form
        View\Components\Form::class,
        View\Components\Label::class,

        // Input
        View\Components\Input::class,
        View\Components\Password::class,
        View\Components\Email::class,
        View\Components\Select::class,
        View\Components\Textarea::class,
        View\Components\ToggleSwitch::class,
        View\Components\Checkbox::class,
        View\Components\Radio::class,
    ];

	public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ignite.php', 'ignite');

        $this->app->singleton(ResourceManager::class);
    }

    /**
     * Register blade components.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/ignite'),
        ], 'ignite-views');

		$this->publishes([
            __DIR__.'/../config/ignite.php' => $this->app->configPath('ignite.php'),
        ], 'ignite-config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ignite');

        $this->loadViewComponentsAs('ignite', $this->components);

        Route::get('/ignite/ignite.js', [IgniteAssetsController::class, 'jsSource']);

        Blade::directive('igniteScripts', function($expression) {
            return "<script type=\"text/javascript\" src=\"/ignite/ignite.js\"></script>";
        });
    }
}
