<?php

namespace TemplateMethod;

class AboutPage extends Page
{
    public function setContent()
    {
        $this->content = $this->render('content', []);
    }
}
