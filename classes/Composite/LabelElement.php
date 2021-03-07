<?php

namespace Composite;

class LabelElement extends SimpleFormElement
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return '<label>' . $this->text . '</label>';
    }

}
