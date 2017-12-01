<?php

namespace Elementl;

use Elementl\Admin\Router as AdminRouter;
use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Api\RouterInterface;
use Elementl\Http\Request;

/**
 * Class Router
 * @package Elementl
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
        if (strpos($request->getUri(), '/elmtl') === 0) {
            $router = new AdminRouter();

            return $router->match($request);
        }
    }
}