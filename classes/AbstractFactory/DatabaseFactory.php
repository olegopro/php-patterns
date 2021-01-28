<?php

namespace AbstractFactory;

interface DatabaseFactory
{
    public function connect(): DatabaseConnect;

    public function query(): DatabaseQuery;
}
