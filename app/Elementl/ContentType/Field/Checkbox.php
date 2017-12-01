<?php

namespace Elementl\ContentType\Field;

/**
 * Class Checkbox
 * @package Elementl\ContentType\Field
 */
class Checkbox extends AbstractField
{
    /**
     * @return string
     */
    public function getSql(): string
    {
        return "$this->name TINYINT";
    }
}