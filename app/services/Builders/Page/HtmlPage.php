<?php

class HtmlPage
{
    private $page = null;
    private $page_content = null;
    private $page_header = null;
    private $page_footer = null;

    public function showPage()
    {
        return $this->page;
    }

    public function setHeader($name, $data = [])
    {
        $header = piece_html($name, $data);

        ob_start();
        extract(isset($header['data']) ? $header['data'] : '');
        include $header['view'];
        $myvar = ob_get_clean();

        $this->page_header = $myvar;
    }

    public function setFooter($name, $data = [])
    {
        $footer = piece_html($name, $data);

        ob_start();
        extract($footer['data']);
        include $footer['view'];
        $myvar = ob_get_clean();

        $this->page_footer = $myvar;
    }

    public function setContent($name, $data = [])
    {
        $content = piece_html($name, $data);


        ob_start();
        extract($content['data']);
        include $content['view'];
        $myvar = ob_get_clean();

        $this->page_content .= $myvar;
    }

    public function formatPage()
    {
        $this->page .= $this->page_header;
        $this->page .= $this->page_content;
        $this->page .= $this->page_footer;

        return $this->page;
    }
}