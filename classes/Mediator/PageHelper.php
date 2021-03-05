<?php

namespace Mediator;

class PageHelper implements IHelper
{
    public $data;
    public $page;
    public $router;

    public function __construct($data, $router, $page)
    {
        $this->data = $data;
        $this->page = $page;
        $this->router = $router;

        $this->data->setPageHelper($this);
        $this->page->setPageHelper($this);
        $this->router->setPageHelper($this);
    }

    public function sendResponse($content)
    {
        $this->router->output($content);
    }

    public function getRequest()
    {
        $this->page->render();
    }

    public function getData()
    {
        return $this->data->getData();
    }
}
