<?php

namespace App\Http;

class Response
{
    private string $content = '';

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function sendResponse()
    {
        echo $this->content;
    }
}