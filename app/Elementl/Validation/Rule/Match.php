<?php

namespace Elementl\Validation\Rule;

use Elementl\Validation\Rules\Exception\InvalidRuleOptionException;

/**
 * Class Match
 * @package Elementl\Validation\Rule
 */
class Match extends AbstractRule
{
    /**
     * @return bool
     * @throws InvalidRuleOptionException
     */
    public function isValid(): bool
    {
        if (!isset($this->options['match'])) {
            throw new InvalidRuleOptionException('Option "match" has not been set for Match rule.');
        }

        return $this->options['match'] === $this->value;
    }


    /**
     * @return string
     */
    public function getError(): string
    {
        return 'Fields do not match.';
    }
}