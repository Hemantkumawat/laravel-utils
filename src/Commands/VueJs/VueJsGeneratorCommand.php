<?php

namespace Hemant\LaravelUtils\Commands\VueJs;

use Hemant\LaravelUtils\Commands\BaseCommand;
use Hemant\LaravelUtils\Common\CommandData;
use Hemant\LaravelUtils\Generators\MigrationGenerator;
use Hemant\LaravelUtils\Generators\ModelGenerator;
use Hemant\LaravelUtils\Generators\RepositoryGenerator;
use Hemant\LaravelUtils\Generators\Scaffold\MenuGenerator;
use Hemant\LaravelUtils\Generators\VueJs\APIRequestGenerator;
use Hemant\LaravelUtils\Generators\VueJs\ControllerGenerator;
use Hemant\LaravelUtils\Generators\VueJs\ModelJsConfigGenerator;
use Hemant\LaravelUtils\Generators\VueJs\RoutesGenerator;
use Hemant\LaravelUtils\Generators\VueJs\ViewGenerator;

class VueJsGeneratorCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'hemant:vuejs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a full CRUD views and config using VueJs Framework for given model';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->commandData = new CommandData($this, CommandData::$COMMAND_TYPE_VUEJS);
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        if (!$this->commandData->getOption('fromTable')) {
            $migrationGenerator = new MigrationGenerator($this->commandData);
            $migrationGenerator->generate();
        }

        $modelGenerator = new ModelGenerator($this->commandData);
        $modelGenerator->generate();

        $repositoryGenerator = new RepositoryGenerator($this->commandData);
        $repositoryGenerator->generate();

        $requestGenerator = new APIRequestGenerator($this->commandData);
        $requestGenerator->generate();

        $controllerGenerator = new ControllerGenerator($this->commandData);
        $controllerGenerator->generate();

        $viewGenerator = new ViewGenerator($this->commandData);
        $viewGenerator->generate();

        $modelJsConfigGenerator = new ModelJsConfigGenerator($this->commandData);
        $modelJsConfigGenerator->generate();

        $routeGenerator = new RoutesGenerator($this->commandData);
        $routeGenerator->generate();

        if ($this->commandData->config->getAddOn('menu.enabled')) {
            $menuGenerator = new MenuGenerator($this->commandData);
            $menuGenerator->generate();
        }

        $this->performPostActionsWithMigration();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), []);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(), []);
    }
}
