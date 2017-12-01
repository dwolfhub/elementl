<?php

namespace Elementl\Admin\RequestHandler\Factory;

use Elementl\Admin\RequestHandler\DashboardRequestHandler;
use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;

/**
 * Class DashboardRequestHandlerFactory
 * @package Elementl\Admin\RequestHandler
 */
class DashboardRequestHandlerFactory implements RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface
    {
        $requestHandler = new DashboardRequestHandler();
        $requestHandler->setEntities($container->get('entities', []));

        return $requestHandler;
    }
}