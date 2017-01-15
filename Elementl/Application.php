<?php
namespace Elementl;

use Elementl\Http\Request;
use Elementl\Storage\Database\Connection;
use Elementl\Theme\Theme;
use Elementl\Theme\ThemeFactory;

/**
 * Class Application
 * @package Elementl
 */
class Application
{
    /**
     * @var array
     */
    protected $settings;

    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    public function bootstrap()
    {
        $this->request = Request::fromGlobals();
    }

    /**
     * @return bool
     */
    public function isInstalled()
    {
        return file_exists($this->settings['dir'] . '/elementl.db');
    }

    public function install()
    {
        $this->connection = new Connection($this->settings['dir']);

        echo 'Installing..';
    }

    public function run()
    {
        $themeFactory = new ThemeFactory($this->settings['dir'] . '/Themes');
        $theme = $themeFactory->create($this->settings['theme']);

        $routes = $theme->getRoutes();
        $router = new Router($routes);
        $file = $router->match($this->request->getUri());

        print($theme->getFileContents($file));
    }
}