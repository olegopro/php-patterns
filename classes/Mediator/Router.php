<?php

namespace Mediator;

class Router extends App
{
    public function request()
    {
        $this->pageHelper->getRequest();
    }

    public function output($content)
    {
        echo $content;
    }
}
