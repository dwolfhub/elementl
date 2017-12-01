<?php

namespace Elementl\Http;

/**
 * Class ResponseDeliverer
 * @package Elementl\Http
 */
class ResponseDeliverer
{
    /**
     * @param Response $response
     */
    public function deliver(Response $response)
    {
        http_response_code($response->getStatusCode());

        foreach ($response->getHeaders() as $header => $value) {
            header($header . ': ' . $value);
        }

        print $response->getBody();
    }
}