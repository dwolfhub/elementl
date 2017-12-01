<?php

namespace Elementl\Validation\Rule;

use Elementl\Validation\RuleInterface;

class Email extends AbstractRule
{
    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return filter_var($this->value, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return 'Please enter a valid email address.';
    }
}