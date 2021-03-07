<?php

namespace Composite;

abstract class ParentFormElement implements IFormRender
{
    private $inputs = [];

    public function render(): string
    {
        $formText = '';

        foreach ($this->inputs as $input) {
            $formText .= $input->render();
        }

        return $formText;
    }

    public function addInput(IFormRender $input)
    {
        $this->inputs[] = $input;
    }

}
