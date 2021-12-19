<?php

namespace Hemant\LaravelUtils;

use Illuminate\Support\ServiceProvider;
use Hemant\LaravelUtils\Commands\API\APIControllerGeneratorCommand;
use Hemant\LaravelUtils\Commands\API\APIGeneratorCommand;
use Hemant\LaravelUtils\Commands\API\APIRequestsGeneratorCommand;
use Hemant\LaravelUtils\Commands\API\TestsGeneratorCommand;
use Hemant\LaravelUtils\Commands\APIScaffoldGeneratorCommand;
use Hemant\LaravelUtils\Commands\Common\MigrationGeneratorCommand;
use Hemant\LaravelUtils\Commands\Common\ModelGeneratorCommand;
use Hemant\LaravelUtils\Commands\Common\RepositoryGeneratorCommand;
use Hemant\LaravelUtils\Commands\Publish\GeneratorPublishCommand;
use Hemant\LaravelUtils\Commands\Publish\LayoutPublishCommand;
use Hemant\LaravelUtils\Commands\Publish\PublishTemplateCommand;
use Hemant\LaravelUtils\Commands\Publish\VueJsLayoutPublishCommand;
use Hemant\LaravelUtils\Commands\RollbackGeneratorCommand;
use Hemant\LaravelUtils\Commands\Scaffold\AppGeneratorCommand;
use Hemant\LaravelUtils\Commands\Scaffold\ControllerGeneratorCommand;
use Hemant\LaravelUtils\Commands\Scaffold\RequestsGeneratorCommand;
use Hemant\LaravelUtils\Commands\Scaffold\RollbackAppGeneratorCommand;
use Hemant\LaravelUtils\Commands\Scaffold\ScaffoldGeneratorCommand;
use Hemant\LaravelUtils\Commands\Scaffold\ViewsGeneratorCommand;
use Hemant\LaravelUtils\Commands\VueJs\VueJsGeneratorCommand;

class HemantLaravelUtilsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/laravel_utils.php';

        $this->publishes([
            $configPath => config_path('hemant/laravel_utils.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hemant.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('hemant.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('hemant.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('hemant.app', function ($app) {
            return new AppGeneratorCommand();
        });
        $this->app->singleton('hemant.app.rollback', function ($app) {
            return new RollbackAppGeneratorCommand();
        });

        $this->app->singleton('hemant.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('hemant.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('hemant.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('hemant.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('hemant.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('hemant.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('hemant.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('hemant.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('hemant.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('hemant.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('hemant.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('hemant.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('hemant.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('hemant.vuejs', function ($app) {
            return new VueJsGeneratorCommand();
        });
        $this->app->singleton('hemant.publish.vuejs', function ($app) {
            return new VueJsLayoutPublishCommand();
        });

        $this->commands([
            'hemant.publish',
            'hemant.api',
            'hemant.scaffold',
            'hemant.app',
            'hemant.app.rollback',
            'hemant.api_scaffold',
            'hemant.publish.layout',
            'hemant.publish.templates',
            'hemant.migration',
            'hemant.model',
            'hemant.repository',
            'hemant.api.controller',
            'hemant.api.requests',
            'hemant.api.tests',
            'hemant.scaffold.controller',
            'hemant.scaffold.requests',
            'hemant.scaffold.views',
            'hemant.rollback',
            'hemant.vuejs',
            'hemant.publish.vuejs',
        ]);
    }
}
