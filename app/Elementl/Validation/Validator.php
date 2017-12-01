<?php

namespace Elementl\Validation;

use Elementl\Helper\Dictionary;
use Elementl\Validation\Rule\AbstractRule;

class Validator
{
    /**
     * @var Dictionary
     */
    protected $errors;

    /**
     * @var AbstractRule[]
     */
    protected $rules;

    /**
     * @var string[]
     */
    protected $data;

    /**
     * Validator constructor.
     *
     * @param AbstractRule[] $rules
     * @param string[] $data
     */
    public function __construct(array $rules = [], array $data = [])
    {
        $this->rules = $rules;
        $this->data = $data;

        $this->errors = new Dictionary();
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $isValid = true;

        foreach ($this->rules as $rule) {
            if (!$this->errors->has($rule->getField())) {
                if (!$rule->isValid()) {
                    $this->errors->set($rule->getField(), $rule->getError());
                    $isValid = false;
                }
            }
        }

        return $isValid;
    }

    /**
     * @return AbstractRule[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param AbstractRule[] $rules
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param AbstractRule $rule
     */
    public function addRule(AbstractRule $rule)
    {
        $this->rules[] = $rule;
    }

    /**
     * @return string[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param string[] $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return Dictionary
     */
    public function getErrors(): Dictionary
    {
        return $this->errors;
    }
}