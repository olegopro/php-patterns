<?php

namespace Mediator;

class Page extends App
{
    public function render()
    {
        $data = $this->pageHelper->getData();
        $this->pageHelper->sendResponse('Page render with data' . $data);
    }
}
