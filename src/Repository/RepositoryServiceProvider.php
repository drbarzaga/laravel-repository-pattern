<?php

namespace Softok2\Repository;

use Illuminate\Support\ServiceProvider;
use Softok2\Repository\Console\Commands\RepositoryMakeCommand;

/**
 * Class RepositoryServiceProvider
 * @package Softok2\Repository
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RepositoryMakeCommand::class
            ]);
        }
    }
}
