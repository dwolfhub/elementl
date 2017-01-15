<?php
namespace Elementl;

use Elementl\Exception\NotFoundException;

class Router
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function match($uri)
    {
        foreach ($this->routes as $regex => $file) {
            if (preg_match('/' . str_replace('/', '\/', $regex). '/', $uri)) {
                return $file;
            }
        }

        throw new NotFoundException();
    }
}