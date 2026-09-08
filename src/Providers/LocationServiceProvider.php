<?php

namespace Panelis\Location\Providers;

use Illuminate\Support\ServiceProvider;
use Panelis\Location\Commands\ImportLocationCommand;

class LocationServiceProvider extends ServiceProvider
{
    private const string NAMESPACE = 'location';

    public function boot(): void
    {
        $this->syncActivityLoggingSetting();

        $this->loadTranslationsFrom(__DIR__.'/../../lang', self::NAMESPACE);

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportLocationCommand::class,
            ]);
        }
    }

    public function register(): void {}

    private function syncActivityLoggingSetting(): void
    {
        $settingClass = 'Panelis\\Setting\\Models\\Setting';

        if (class_exists($settingClass) && config()->has('activitylog.enabled')) {
            config()->set('activitylog.enabled', $settingClass::get('activity.enabled', config('activitylog.enabled')));
        }
    }
}
