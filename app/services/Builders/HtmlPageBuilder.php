<?php


class HtmlPageBuilder extends  AbstractPageBuilder
{

    private $page = null;

    public function __construct()
    {
        $this->page = new HtmlPage();
    }

    public function setContent($name, $data = [])
    {
        $this->page->setContent($name, $data);
    }

    public function setHeader($name, $data = [])
    {
        $this->page->setContent($name, $data);
    }

    public function setFooter($name, $data = [])
    {
        $this->page->setContent($name, $data);
    }

    public function formatPage()
    {
        $this->page->formatPage();
    }

    public function render()
    {
        echo $this->page->formatPage();
    }

}