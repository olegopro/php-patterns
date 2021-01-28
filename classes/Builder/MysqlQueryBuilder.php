<?php

namespace Builder;

class MysqlQueryBuilder implements SQLQueryBuilder
{
    private $query;

    public function init()
    {
        $this->query = new \stdClass();
    }

    public function select(array $fields): SQLQueryBuilder
    {
        $this->init();
        $this->query->base = 'SELECT ' . implode(', ', $fields);

        return $this;
    }

    public function from(string $table): SQLQueryBuilder
    {
        $this->query->base .= ' FROM ' . $table;

        return $this;
    }

    public function where(string $field, string $operator = '', string $value = ''): SQLQueryBuilder
    {
        if (func_num_args() == 2) {
            $this->query->where[] = $field . ' = ' . $operator;
        } else {
            $this->query->where[] = $field . ' ' . $operator . ' ' . $value;
        }

        return $this;
    }

    public function limit(int $start, int $offset): SQLQueryBuilder
    {
        $this->query->limit = ' LIMIT ' . $start . ', ' . $offset;

        return $this;
    }

    public function getQuery(): string
    {
        $sql = '';
        $sql .= $this->query->base;
        if (!empty($this->query->where)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->query->where);
        }
        if (!empty($this->query->limit)) {
            $sql .= $this->query->limit;
        }

        $sql .= ';';

        return $sql;
    }
}
