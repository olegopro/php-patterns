<?php

namespace Mediator;

interface IHelper
{
    public function sendResponse($content);

    public function getRequest();

    public function getData();
}
