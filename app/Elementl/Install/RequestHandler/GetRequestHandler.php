<?php

namespace Elementl\Install\RequestHandler;

use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;
use Elementl\Http\Request;
use Elementl\Http\Response;

/**
 * Class GetRequestHandler
 * @package Elementl\Install\RequestHandler
 */
class GetRequestHandler implements RequestHandlerInterface
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $errors = @unserialize($request->getSession()->get(PostRequestHandler::ERRORS_SESSION_KEY)) ?: new Dictionary();
        $request->getSession()->unset(PostRequestHandler::ERRORS_SESSION_KEY);

        $data = @unserialize($request->getSession()->get(PostRequestHandler::DATA_SESSION_KEY)) ?: new Dictionary();
        $request->getSession()->unset(PostRequestHandler::DATA_SESSION_KEY);

        $nonce = base64_encode(bin2hex(openssl_random_pseudo_bytes(16)));
        $request->getSession()->set(PostRequestHandler::NONCE_SESSION_KEY, $nonce);

        $response = new Response();

        ob_start();
        require __DIR__ . '/templates/install.php';
        $response->setBody(ob_get_clean());

        return $response;
    }

}