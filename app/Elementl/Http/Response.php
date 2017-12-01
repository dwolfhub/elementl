<?php

namespace Elementl\Http;

use Elementl\Helper\Dictionary;

/**
 * Class Response
 * @package Elementl\Http
 */
class Response
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var Dictionary
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    /**
     * Response constructor.
     *
     * @param int $statusCode
     * @param Dictionary $headers
     * @param string $body
     */
    public function __construct(int $statusCode = 200, Dictionary $headers = null, string $body = '')
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers ?: new Dictionary([]);
        $this->body = $body;
    }

    /**
     * @return Dictionary
     */
    public function getHeaders(): Dictionary
    {
        return $this->headers;
    }

    /**
     * @param Dictionary $headers
     */
    public function setHeaders(Dictionary $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }
}