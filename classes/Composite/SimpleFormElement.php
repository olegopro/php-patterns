<?php

namespace Composite;

abstract class SimpleFormElement implements IFormRender
{
    abstract public function render(): string;
}
