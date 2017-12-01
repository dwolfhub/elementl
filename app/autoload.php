<?php

spl_autoload_register(
    function ($class_name) {
        $file = __DIR__ . '/' . str_replace('\\', '/', $class_name . '.php');

        if (
            !defined('TESTING') // allows for fallback to composer autoload while running phpunit tests
            || file_exists($file)
        ) {
            require_once($file);
        }
    }
);
