<?php

namespace Elementl\Admin\RequestHandler;

use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;
use Elementl\Http\Request;
use Elementl\Http\Response;

/**
 * Class LoginRequestHandler
 * @package Elementl\Admin\RequestHandler
 */
class LoginRequestHandler implements RequestHandlerInterface
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $errors = @unserialize($request->getSession()->get('login.errors')) ?: new Dictionary();
        $request->getSession()->unset('login.errors');

        $data = @unserialize($request->getSession()->get('login.data')) ?: new Dictionary();
        $request->getSession()->unset('login.data');

        $nonce = base64_encode(bin2hex(openssl_random_pseudo_bytes(16)));
        $request->getSession()->set('login.nonce', $nonce);

        $response = new Response();

        ob_start();
        require __DIR__ . '/templates/login.php';
        $response->setBody(ob_get_clean());

        return $response;
    }
}