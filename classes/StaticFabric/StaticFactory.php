<?php

namespace StaticFabric;

class StaticFactory
{
    public static function create(string $type): IFactory
    {
        //if ($type == 'save') {
        //    return new FactoryClass();
        //}
        return new $type();
    }
}