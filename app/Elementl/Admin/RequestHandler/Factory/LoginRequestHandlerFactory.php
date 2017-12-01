<?php

namespace Elementl\Admin\RequestHandler\Factory;

use Elementl\Admin\RequestHandler\LoginRequestHandler;
use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;

/**
 * Class LoginRequestHandlerFactory
 * @package Elementl\Admin\RequestHandler\Factory
 */
class LoginRequestHandlerFactory implements RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface
    {
        return new LoginRequestHandler();
    }
}