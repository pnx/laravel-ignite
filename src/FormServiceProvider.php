<?php

namespace Ignite;

use Ignite\Controllers\IgniteAssetsController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
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
        View\Components\Select::class
    ];

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

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ignite');

        $this->loadViewComponentsAs('ignite', $this->components);

        Route::get('/ignite/ignite.js', [IgniteAssetsController::class, 'jsSource']);

        Blade::directive('igniteScripts', function($expression) {
            return "<script type=\"text/javascript\" src=\"/ignite/ignite.js\"></script>";
        });
    }
}
