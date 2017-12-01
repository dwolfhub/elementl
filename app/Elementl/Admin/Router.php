<?php

namespace Elementl\Admin;

use Elementl\Admin\RequestHandler\Factory\DashboardRequestHandlerFactory;
use Elementl\Admin\RequestHandler\Factory\EntityTableRequestHandlerFactory;
use Elementl\Admin\RequestHandler\Factory\LoginRequestHandlerFactory;
use Elementl\Admin\RequestHandler\Factory\NotAuthorizedRequestHandlerFactory;
use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RouterInterface;
use Elementl\Http\Request;

/**
 * Class Router
 * @package Elementl\Admin
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
        if ($request->getUri() === '/elmtl/login') {
            return new LoginRequestHandlerFactory();
        }

        if (!$request->getSession()->has('user_id')) {
            return new NotAuthorizedRequestHandlerFactory();
        }

        if ($request->getUri() === '/elmtl') {
            return new DashboardRequestHandlerFactory();
        }

        if (strpos($request->getUri(), '/elmtl/entities') === 0) {
            return new EntityTableRequestHandlerFactory();
        }
    }
}