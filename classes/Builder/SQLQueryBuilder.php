<?php

namespace Builder;

interface SQLQueryBuilder
{
    public function select(array $fields): SQLQueryBuilder;

    public function from(string $table): SQLQueryBuilder;

    public function where(string $field, string $operator = '', string $value = ''): SQLQueryBuilder;

    public function limit(int $start, int $offset): SQLQueryBuilder;

    public function getQuery(): string;
}
