<?php

namespace Elementl\Validation;

/**
 * Class Error
 * @package Elementl\Validation
 */
class Error
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $error;

    /**
     * Error constructor.
     *
     * @param string $field
     * @param string $value
     * @param string $error
     */
    public function __construct(string $field = '', string $value = '', string $error = '')
    {
        $this->field = $field;
        $this->value = $value;
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField(string $field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError(string $error)
    {
        $this->error = $error;
    }
}