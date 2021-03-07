<?php

namespace Composite;

class FieldsetElement extends ParentFormElement
{
    public function render(): string
    {
        $formText = '<fieldset>';

        $formText .= parent::render();

        $formText .= '</fieldset>';

        return $formText;
    }
}
