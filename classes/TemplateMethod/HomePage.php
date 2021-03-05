<?php

namespace TemplateMethod;

class HomePage extends Page
{
    public function setContent()
    {
       $this->content = $this->render('content', []);
    }
}
