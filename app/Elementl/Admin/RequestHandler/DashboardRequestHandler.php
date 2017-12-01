<?php

namespace Elementl\Admin\RequestHandler;

use Elementl\Http\Request;
use Elementl\Http\Response;

/**
 * Class DashboardRequestHandler
 * @package Elementl\Admin\RequestHandler
 */
class DashboardRequestHandler extends AbstractAdminRequestHandler
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $entities = $this->entities;

        ob_start();
        require __DIR__ . '/templates/dashboard.php';
        $body = ob_get_clean();

        return new Response(200, null, $body);
    }
}