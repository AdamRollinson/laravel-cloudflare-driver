<?php

namespace Rollogi\LaravelCloudflareDriver\D1;

use Illuminate\Database\Schema\Grammars\SQLiteGrammar;
use Illuminate\Support\Str;

class D1SchemaGrammar extends SQLiteGrammar
{
    public function compileTableExists($table): string
    {
        return Str::of(parent::compileTableExists($table))
            ->replace('sqlite_master', 'sqlite_schema')
            ->__toString();
    }

    public function compileDropAllTables(): string
    {
        return Str::of(parent::compileDropAllTables())
            ->replace('sqlite_master', 'sqlite_schema')
            ->__toString();
    }

    public function compileDropAllViews(): string
    {
        return Str::of(parent::compileDropAllViews())
            ->replace('sqlite_master', 'sqlite_schema')
            ->__toString();
    }
}
