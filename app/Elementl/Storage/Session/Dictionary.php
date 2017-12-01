<?php

namespace Elementl\Storage\Session;

/**
 * Class Dictionary
 * @package Elementl\storage\Session
 */
class Dictionary extends \Elementl\Helper\Dictionary
{
    /**
     * @param string $key
     * @param $value
     */
    public function set($key, $value)
    {
        parent::set($key, $value);

        $_SESSION[$key] = $value;
    }
}