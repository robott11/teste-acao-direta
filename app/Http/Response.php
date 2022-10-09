<?php

namespace App\Http;

class Response
{
    private int $httpCode = 200;

    private array $headers = [];

    private string $content = '';

    public function __construct(int $statusCode = 200, string $content = '', string $contentType = 'text/html')
    {
        $this->httpCode = $statusCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    public function redirect(string $to): Response
    {
        $this->addHeader('Location', $to);

        return $this;
    }

    public function withError(string $key, string $value): Response
    {
        $_SESSION['errors'][$key] = $value;

        return $this;
    }

    private function setContentType(string $contentType): void
    {
        $this->addHeader('Content-Type', $contentType);
    }

    private function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    private function sendHeaders(): void
    {
        http_response_code($this->httpCode);

        foreach ($this->headers as $key => $value) {
            header($key.": ".$value);
        }
    }

    public function sendResponse(): void
    {
        $this->sendHeaders();

        switch ($this->headers['Content-Type']) {
            case 'text/html':
                echo $this->content;
                break;
        }
    }
}