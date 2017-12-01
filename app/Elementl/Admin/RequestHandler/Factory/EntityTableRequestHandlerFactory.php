<?php

namespace Elementl\Admin\RequestHandler\Factory;

use Elementl\Admin\RequestHandler\EntityTableRequestHandler;
use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;

/**
 * Class EntityTableRequestHandlerFactory
 * @package Elementl\Admin\RequestHandler\Factory
 */
class EntityTableRequestHandlerFactory implements RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface
    {
        $requestHandler = new EntityTableRequestHandler();
        $requestHandler->setEntities($container->get('entities', []));

        return $requestHandler;
    }

}