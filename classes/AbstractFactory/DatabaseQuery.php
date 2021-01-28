<?php

namespace AbstractFactory;

interface DatabaseQuery
{
    public function execute(string $query);
}
