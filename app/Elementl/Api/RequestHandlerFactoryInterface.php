<?php

namespace Elementl\Api;

use Elementl\Helper\Dictionary;

/**
 * Interface RequestHandlerFactoryInterface
 * @package Elementl\Api
 */
interface RequestHandlerFactoryInterface
{
    /**
     * @param Dictionary $container
     *
     * @return RequestHandlerInterface
     */
    public function create(Dictionary $container): RequestHandlerInterface;
}