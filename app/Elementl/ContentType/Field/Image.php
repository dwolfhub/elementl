<?php

namespace Elementl\ContentType\Field;

/**
 * Class Image
 * @package Elementl\ContentType\Field
 */
class Image extends AbstractField
{
    /**
     * @return string
     */
    public function getSql(): string
    {
        return "$this->name TEXT";
    }

}