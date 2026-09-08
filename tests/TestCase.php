<?php

namespace Panelis\Location\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Panelis\Activity\Providers\ActivityServiceProvider;
use Panelis\Location\Providers\LocationServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ActivityServiceProvider::class,
            LocationServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite.database', ':memory:');
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadMigrationsFrom(base_path('../activity/database/migrations'));
    }
}
