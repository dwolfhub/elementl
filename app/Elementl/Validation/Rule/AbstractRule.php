<?php

namespace Elementl\Validation\Rule;


abstract class AbstractRule
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var string
     */
    protected $value;

    /**
     * AbstractRule constructor.
     *
     * @param string $value
     * @param array $options
     */
    public function __construct(string $field, string $value = '', array $options = [])
    {
        $this->field = $field;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * @return bool
     */
    abstract public function isValid(): bool;

    /**
     * @return string
     */
    abstract public function getError(): string;

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
}