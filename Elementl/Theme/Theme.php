<?php
namespace Elementl\Theme;

use RuntimeException;

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

        $this->$dir = $dir;
        $this->settings = require $themeSettingsFile;
    }

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
        return file_get_contents($this->dir . '/' . $fileName);
    }
}