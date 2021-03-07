<?php

namespace Composite;

class InputElement extends SimpleFormElement
{
    public function render(): string
    {
        return '<input type="text" />';
    }
}
