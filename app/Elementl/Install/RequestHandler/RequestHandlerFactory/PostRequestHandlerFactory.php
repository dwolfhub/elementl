<?php

namespace Elementl\Install\RequestHandler\RequestHandlerFactory;

use Elementl\Api\RequestHandlerFactoryInterface;
use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;
use Elementl\Install\RequestHandler\PostRequestHandler;

/**
 * Class PostRequestHandlerFactory
 * @package Elementl\Install\RequestHandler\RequestHandlerFactory
 */
class PostRequestHandlerFactory implements RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface
    {
        $requestHandler = new PostRequestHandler();

        $requestHandler->setEntities($container->get('entities', []));
        $requestHandler->setStorageAdapter($container->get('db'));
        $requestHandler->setStorageDirectory($container->get('settings')['dir'] . '/storage');

        return $requestHandler;
    }

}