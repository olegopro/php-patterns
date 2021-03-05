<?php

namespace Mediator;

abstract class App
{
    protected $pageHelper;

    public function setPageHelper(IHelper $pageHelper)
    {
        $this->pageHelper = $pageHelper;
    }
}
