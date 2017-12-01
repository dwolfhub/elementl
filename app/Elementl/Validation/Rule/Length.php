<?php

namespace Elementl\Validation\Rule;

/**
 * Class Length
 * @package Elementl\Validation\Rule
 */
class Length extends AbstractRule
{
    const MAX_OPTION = 'max';
    const MIN_OPTION = 'min';

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $length = strlen($this->value);

        if (isset($this->options[self::MIN_OPTION])) {
            if ($length < $this->options[self::MIN_OPTION]) {
                return false;
            }
        }

        if (isset($this->options[self::MAX_OPTION])) {
            if ($length > $this->options[self::MAX_OPTION]) {
                return false;
            }
        }

        return true;
    }


    /**
     * @return string
     */
    public function getError(): string
    {
        if (isset($this->options[self::MIN_OPTION]) && isset($this->options[self::MAX_OPTION])) {
            return sprintf(
                'Must be between %d and %d characters long.',
                $this->options[self::MIN_OPTION],
                $this->options[self::MAX_OPTION]
            );
        }

        if (isset($this->options[self::MIN_OPTION])) {
            return sprintf(
                'Must be at least %d characters long.',
                $this->options[self::MIN_OPTION]
            );
        }

        if (isset($this->options[self::MAX_OPTION])) {
            return sprintf(
                'Must be no more than %d characters long.',
                $this->options[self::MAX_OPTION]
            );
        }
    }
}