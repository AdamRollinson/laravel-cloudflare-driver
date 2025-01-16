<?php

namespace Rollogi\LaravelCloudflareDriver\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;

class D1MigrateCommand extends Command
{
    protected $signature = 'd1:migrate {cmd?}
        {--connection=}
        {--force=}
    ';

    protected $description = 'Run migrations for d1';

    public function handle(): void
    {
        $command = $this->argument('cmd')
            ? sprintf('migrate:%s', $this->argument('cmd'))
            : 'migrate';

        $parameters = [
            '--path' => 'database/migrations/d1',
            '--database' => $this->option('connection') ?? 'd1',
        ];

        if (! $this->argument('cmd') == 'status') {
            Arr::set($parameters, '--force', $this->option('force') ?? false);
        }

        Artisan::call(
            command: $command,
            parameters: $parameters,
        );

        $this->line(Artisan::output());
    }
}
