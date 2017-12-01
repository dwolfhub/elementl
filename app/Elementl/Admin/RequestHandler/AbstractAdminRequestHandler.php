<?php

namespace Elementl\Admin\RequestHandler;

use Elementl\Api\RequestHandlerInterface;
use Elementl\ContentType\Entity;

/**
 * Class AbstractAdminRequestHandler
 * @package Elementl\Admin\RequestHandler
 */
abstract class AbstractAdminRequestHandler implements RequestHandlerInterface
{
    /**
     * @var Entity[]
     */
    protected $entities;

    /**
     * @return Entity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param Entity[] $entities
     */
    public function setEntities(array $entities)
    {
        $this->entities = $entities;
    }
}