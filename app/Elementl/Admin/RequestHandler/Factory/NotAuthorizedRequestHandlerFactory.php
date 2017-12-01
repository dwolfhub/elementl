<?php

namespace Elementl\Admin\RequestHandler\Factory;

use Elementl\Admin\RequestHandler\NotAuthorizedRequestHandler;
use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;

/**
 * Class NotAuthorizedRequestHandlerFactory
 * @package Elementl\Admin\RequestHandler
 */
class NotAuthorizedRequestHandlerFactory implements RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface
    {
        return new NotAuthorizedRequestHandler();
    }
}