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
     * @var FileParser
     */
    protected $fileParser;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @param string $dir
     * @param FileParser $fileParser
     */
    public function __construct($dir, FileParser $fileParser)
    {
        $themeSettingsFile = $dir . '/settings.php';
        if (!file_exists($themeSettingsFile)) {
            throw new RuntimeException(
                sprintf('Theme settings file "settings.php" not found in %s', $dir)
            );
        }

        $this->dir = $dir;
        $this->fileParser = $fileParser;
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
        return $this->fileParser->parseFile($fileName)->saveHTML();
    }
}