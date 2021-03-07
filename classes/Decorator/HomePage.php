<?php

namespace Decorator;

class HomePage extends PageDecorator
{
    public function getTitle()
    {
        return $this->page->getTitle() . ' | Home Page';
    }

    public function render()
    {
        return $this->page->render(). ' | Content Home Page';
    }
}
