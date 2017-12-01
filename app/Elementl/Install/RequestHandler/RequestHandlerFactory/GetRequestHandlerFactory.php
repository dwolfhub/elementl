<?php

namespace Elementl\Install\RequestHandler\RequestHandlerFactory;

use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;
use Elementl\Install\RequestHandler\GetRequestHandler;

/**
 * Class GetRequestHandlerFactory
 * @package Elementl\Install\RequestHandler\RequestHandlerFactory
 */
class GetRequestHandlerFactory implements RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface
    {
        return new GetRequestHandler();
    }
}