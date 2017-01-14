<?php
namespace Elementl\Theme;

use RuntimeException;

class Theme
{
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
                sprintf('Settings file "settings.php" not found in %s', $dir)
            );
        }

        $settings = require $themeSettingsFile;
    }
}