<?php

namespace app\database;

final class DatabaseConfiguration
{
    public function __construct(
        private string $port,
        private string $host,
        private string $dbname,
        private string $username,
        private string $password,
        private string $charset,
        private array $options = [],
    ) {}

    public function getPort(): string
    {
        return $this->port;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

}
