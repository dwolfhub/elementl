<?php

namespace Elementl\ContentType\Field;

/**
 * Class AbstractField
 * @package Elementl\ContentType\Field
 */
abstract class AbstractField
{
    /**
     * @var string
     */
    protected $name;

    /**
     * AbstractField constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    abstract public function getSql(): string;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}