<?php

namespace Elementl\Admin\RequestHandler;

use Elementl\Api\RequestHandlerInterface;
use Elementl\Helper\Dictionary;
use Elementl\Http\Request;
use Elementl\Http\Response;

/**
 * Class NotAuthorizedRequestHandler
 * @package Elementl\Admin\RequestHandler
 */
class NotAuthorizedRequestHandler extends AbstractAdminRequestHandler
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        return new Response(302, new Dictionary(['Location' => '/elmtl/login']));
    }
}