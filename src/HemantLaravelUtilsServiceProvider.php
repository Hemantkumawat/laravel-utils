<?php

namespace Hemant\Utils;

use Illuminate\Support\ServiceProvider;
use Hemant\Utils\Commands\API\APIControllerGeneratorCommand;
use Hemant\Utils\Commands\API\APIGeneratorCommand;
use Hemant\Utils\Commands\API\APIRequestsGeneratorCommand;
use Hemant\Utils\Commands\API\TestsGeneratorCommand;
use Hemant\Utils\Commands\APIScaffoldGeneratorCommand;
use Hemant\Utils\Commands\Common\MigrationGeneratorCommand;
use Hemant\Utils\Commands\Common\ModelGeneratorCommand;
use Hemant\Utils\Commands\Common\RepositoryGeneratorCommand;
use Hemant\Utils\Commands\Publish\GeneratorPublishCommand;
use Hemant\Utils\Commands\Publish\LayoutPublishCommand;
use Hemant\Utils\Commands\Publish\PublishTemplateCommand;
use Hemant\Utils\Commands\Publish\VueJsLayoutPublishCommand;
use Hemant\Utils\Commands\RollbackGeneratorCommand;
use Hemant\Utils\Commands\Scaffold\AppGeneratorCommand;
use Hemant\Utils\Commands\Scaffold\ControllerGeneratorCommand;
use Hemant\Utils\Commands\Scaffold\RequestsGeneratorCommand;
use Hemant\Utils\Commands\Scaffold\RollbackAppGeneratorCommand;
use Hemant\Utils\Commands\Scaffold\ScaffoldGeneratorCommand;
use Hemant\Utils\Commands\Scaffold\ViewsGeneratorCommand;
use Hemant\Utils\Commands\VueJs\VueJsGeneratorCommand;

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
