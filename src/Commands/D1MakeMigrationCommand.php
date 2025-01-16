<?php

namespace Rollogi\LaravelCloudflareDriver\Commands;

use Illuminate\Console\GeneratorCommand;

class D1MakeMigrationCommand extends GeneratorCommand
{
    protected $signature = 'make:d1 {name : The name of the migration}';
    protected $description = 'Create a new migration file in the database/migrations/d1 directory';
    protected $type = 'Migration';

    protected function getPath($name): string
    {
        $timestamp = date('Y_m_d_His');
        $migrationName = $this->argument('name');

        return base_path("database/migrations/d1/{$timestamp}_{$migrationName}.php");
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/migration.stub');
    }

    protected function resolveStubPath($stub): string
    {
        return is_file(base_path($stub)) ? base_path($stub) : __DIR__ . $stub;
    }
}
