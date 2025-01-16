<?php

namespace Rollogi\LaravelCloudflareDriver;

use Rollogi\LaravelCloudflareDriver\Commands\D1MakeMigrationCommand;
use Rollogi\LaravelCloudflareDriver\Commands\D1MigrateCommand;
use Rollogi\LaravelCloudflareDriver\D1\CloudflareD1Connector;
use Rollogi\LaravelCloudflareDriver\D1\D1Connection;
use Spatie\LaravelPackageTools\Exceptions\InvalidPackage;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelCloudflareDriverServiceProvider extends PackageServiceProvider
{
    public function register(): self
    {
        try {
            parent::register();

            $this->app->resolving('db', function ($db) {
                $db->extend('d1', function ($config, $name) {
                    $config['name'] = $name;

                    return new D1Connection(
                        new CloudflareD1Connector(
                            $config['database'],
                            $config['auth']['token'],
                            $config['auth']['account_id'],
                            $config['api'] ?? 'https://api.cloudflare.com/client/v4',
                        ),
                        $config,
                    );
                });
            });
        } catch (InvalidPackage $exception) {
            report($exception);
        }

        return $this;
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->hasCommands([
                D1MigrateCommand::class,
                D1MakeMigrationCommand::class,
            ])
            ->name('laravel-cloudflare-driver');
    }
}
