<?php

namespace Rollogi\LaravelCloudflareDriver\D1\PDO;

use PDO;
use PDOStatement;
use Rollogi\LaravelCloudflareDriver\D1\CloudflareD1Connector;

class D1Pdo extends PDO
{
    protected array $lastInsertIds = [];

    protected bool $inTransaction = false;

    public function __construct(
        protected string $dsn,
        protected $connector,
    ) {
        parent::__construct('sqlite::memory:');
    }

    public function prepare($query, $options = []): PDOStatement|false
    {
        return new D1PdoStatement(
            $this,
            $query,
            $options,
        );
    }

    public function d1(): CloudflareD1Connector
    {
        return $this->connector;
    }

    public function setLastInsertId($name = null, $value = null): void
    {
        if ($name === null) {
            $name = 'id';
        }

        $this->lastInsertIds[$name] = $value;
    }

    public function lastInsertId($name = null): string|false
    {
        if ($name === null) {
            $name = 'id';
        }

        return $this->lastInsertIds[$name] ?? false;
    }

    public function beginTransaction(): bool
    {
        return $this->inTransaction = true;
    }

    public function commit(): bool
    {
        return ! $this->inTransaction;
    }

    public function inTransaction(): bool
    {
        return $this->inTransaction;
    }
}
