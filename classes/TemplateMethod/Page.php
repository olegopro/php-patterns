<?php

namespace TemplateMethod;

abstract class Page
{
    protected $header;
    protected $content;
    protected $footer;

    protected $page;

    abstract public function setContent();

    protected function setHeader()
    {
        $this->header = $this->render('header', array());
    }

    protected function setFooter()
    {
        $this->footer = $this->render('footer', array());
    }

    public function output()
    {
        $this->setHeader();
        $this->setContent();
        $this->setFooter();
        $this->page = $this->render('main', [
            'header' => $this->header,
            'content' => $this->content,
            'footer' => $this->footer
        ]);

        return $this->getPage();
    }

    protected function render($path, $param = array())
    {
        extract($param);

        ob_start();
        if (!file_exists('classes/TemplateMethod/theme/' . $path . '.php')) {
            throw new \Exception('Шаблона нет');
        }
        include 'classes/TemplateMethod/theme/' . $path . '.php';

        return ob_get_clean();
    }

    public function getPage()
    {
        echo $this->page;
    }
}
