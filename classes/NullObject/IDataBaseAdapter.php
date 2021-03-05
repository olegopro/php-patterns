<?php

namespace NullObject;

interface IDataBaseAdapter
{
    public function connect();

    public function getDb();

    public function query($query);
}
