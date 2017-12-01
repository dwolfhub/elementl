<?php

namespace Elementl\Validation\Rule;

/**
 * Class NotBlank
 * @package Elementl\Validation\Rule
 */
class NotBlank extends AbstractRule
{
    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return strlen($this->value) !== 0;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return 'Field cannot be blank.';
    }
}