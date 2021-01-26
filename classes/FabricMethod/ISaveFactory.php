<?php

namespace FabricMethod;

interface ISaveFactory
{
    public function createSaver(): ISave;
}
