<?php

namespace IsnanIas\Enum;

use Illuminate\Support\ServiceProvider;
use IsnanIas\Enum\Commands\MakeEnumCommand;

class EnumServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeEnumCommand::class,
            ]);
        }
    }

    /**
     * Register any package services.
     */
    public function register()
    {
    }
}
