<?php

namespace Elementl\Api;

use Elementl\Http\Request;
use Elementl\Http\Response;

/**
 * Interface RequestHandlerInterface
 * @package Elementl\Api
 */
interface RequestHandlerInterface
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response;
}