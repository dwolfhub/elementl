<?php

namespace Elementl\Admin\RequestHandler;

use Elementl\Api\RequestHandlerInterface;
use Elementl\Http\Request;
use Elementl\Http\Response;

/**
 * Class EntityTableRequestHandler
 * @package Elementl\Admin\RequestHandler
 */
class EntityTableRequestHandler extends AbstractAdminRequestHandler
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $entities = $this->entities;
        $tableEntity = null;

        $entityUriParts = explode('/', $request->getUri());

        if (empty($entityUriParts[3])) {
            // TODO not found!
            $x = 1;
        }

        $entityUri = $entityUriParts[3];

        foreach ($entities as $ent) {
            if ($ent->getName() === $entityUri) {
                $tableEntity = $ent;
            }
        }

        if (!$tableEntity) {
            // TODO not found!
            $x = 1;
        }

        ob_start();
        require __DIR__ . '/templates/entities/table.php';
        $body = ob_get_clean();

        return new Response(200, null, $body);
    }
}