<?php

namespace Elementl\Helper;

use ArrayIterator;
use IteratorAggregate;

/**
 * Class Dictionary
 * @package Elementl\Helper
 */
class Dictionary implements IteratorAggregate
{
    /**
     * @var array
     */
    protected $dict;

    /**
     * @param array $dict
     */
    public function __construct(array $dict = [])
    {
        $this->dict = $dict;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        return isset($this->dict[$key]);
    }

    /**
     * @param $key
     * @param null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (isset($this->dict[$key])) {
            return $this->dict[$key];
        }

        return $default;
    }

    /**
     * @param string $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->dict[$key] = $value;
    }

    /**
     * @param $key
     */
    public function unset($key)
    {
        unset($this->dict[$key]);
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->dict);
    }
}