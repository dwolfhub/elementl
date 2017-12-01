<?php

namespace Elementl\Install;

use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RouterInterface;
use Elementl\Http\Request;
use Elementl\Install\RequestHandler\RequestHandlerFactory\GetRequestHandlerFactory;
use Elementl\Install\RequestHandler\RequestHandlerFactory\PostRequestHandlerFactory;

/**
 * Class Router
 * @package Elementl\Install
 */
class Router implements RouterInterface
{
    /**
     * @param Request $request
     *
     * @return RequestHandlerFactoryInterface
     */
    public function match(Request $request): RequestHandlerFactoryInterface
    {
        if ($request->getMethod() === 'GET') {
            return new GetRequestHandlerFactory();
        } else if ($request->getMethod() === 'POST') {
            return new PostRequestHandlerFactory();
        }
    }
}