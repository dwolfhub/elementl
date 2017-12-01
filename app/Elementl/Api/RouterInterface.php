<?php

namespace Elementl\Api;

use Elementl\Http\Request;

/**
 * Interface RouterInterface
 * @package Elementl\Api
 */
interface RouterInterface
{
    /**
     *
     * @param Request $request
     *
     * @return RequestHandlerFactoryInterface
     */
    public function match(Request $request): RequestHandlerFactoryInterface;
}