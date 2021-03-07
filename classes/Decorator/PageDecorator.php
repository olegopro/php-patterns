<?php

namespace Decorator;

abstract class PageDecorator implements IPage
{
    protected $page;

    public function __construct(IPage $page)
    {
        $this->page = $page;
    }
}
