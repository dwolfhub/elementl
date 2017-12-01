<?php

namespace Elementl\ContentType\Field;

/**
 * Class Text
 * @package Elementl\ContentType\Field
 */
class Text extends AbstractField
{
    /**
     * @return string
     */
    public function getSql(): string
    {
        return "$this->name TEXT";
    }
}