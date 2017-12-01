<?php

namespace Elementl;

use Elementl\ContentType\Entity;
use Elementl\ContentType\Field\Text;
use Elementl\DependencyInjection\Container;
use Elementl\Helper\Dictionary;
use Elementl\Http\Request;
use Elementl\Http\ResponseDeliverer;
use Elementl\Install;
use Elementl\Storage\Database\Connection;
use Elementl\Storage\Database\SqliteStorageAdapter;

/**
 * Class Application
 * @package Elementl
 */
class Application
{
    /**
     * @var Dictionary
     */
    protected $container;

    /**
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->container = new Dictionary();

        $this->container->set('settings', $settings);
        $this->container->set('response_deliverer', new ResponseDeliverer());
        $this->container->set('db', new SqliteStorageAdapter($settings['dir'] . '/storage'));
    }

    /**
     * @param array $entities
     */
    public function bootstrap(array $entities = [])
    {
        $entities[] = new Entity(
            'users', [
                new Text('email'),
                new Text('username'),
                new Text('password'),
            ]
        );

        $this->container->set('entities', $entities);
        $this->container->set('request', Request::fromGlobals());
    }

    /**
     * @return bool
     */
    public function isInstalled(): bool
    {
        return file_exists($this->container->get('settings')['dir'] . '/storage/installed');
    }

    public function install()
    {
        $router = new Install\Router();
        $handlerFactory = $router->match($this->container->get('request'));
        $handler = $handlerFactory->create($this->container);
        $response = $handler->handle($this->container->get('request'));

        $this->container->get('response_deliverer')->deliver($response);
    }

    public function run()
    {
        if (!$this->isInstalled()) {
            $this->install();
        } else {
            $router = new Router();

            $handlerFactory = $router->match($this->container->get('request'));
            $handler = $handlerFactory->create($this->container);
            $response = $handler->handle($this->container->get('request'));

            $this->container->get('response_deliverer')->deliver($response);
        }
    }
}