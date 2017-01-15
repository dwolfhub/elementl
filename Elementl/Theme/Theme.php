<?php
namespace Elementl\Theme;

use RuntimeException;

/**
 * Class Theme
 * @package Elementl\Theme
 */
class Theme
{
    /**
     * @var string
     */
    protected $dir;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @param string $dir
     */
    public function __construct($dir)
    {
        $themeSettingsFile = $dir . '/settings.php';
        if (!file_exists($themeSettingsFile)) {
            throw new RuntimeException(
                sprintf('Theme settings file "settings.php" not found in %s', $dir)
            );
        }

        $this->dir = $dir;
        $this->settings = require $themeSettingsFile;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        if (empty($this->settings['routes'])) {
            throw new RuntimeException(
                sprintf('Theme settings file has no routes configured')
            );
        }

        return $this->settings['routes'];
    }

    /**
     * @param $fileName
     * @return string
     */
    public function getFileContents($fileName)
    {
        if (!file_exists($this->dir . '/' . $fileName)) {
            throw new RuntimeException(
                sprintf('Invalid file name "%s" in theme settings.php file', $fileName)
            );
        }

        return file_get_contents($this->dir . '/' . $fileName);
    }
}