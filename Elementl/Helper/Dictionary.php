<?php
namespace Elementl\Helper;

/**
 * Class Dictionary
 * @package Elementl\Helper
 */
class Dictionary
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
     * @param null $default
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

}