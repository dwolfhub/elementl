<?php
namespace Elementl\Theme;

use InvalidArgumentException;

class ThemeFactory
{
    /**
     * @var string
     */
    protected $themeDir;

    /**
     * @param string $themeDir
     */
    public function __construct($themeDir)
    {
        $this->themeDir = $themeDir;
    }

    /**
     * @param string $name
     * @return Theme
     */
    public function create($name)
    {
        $chosenThemeDir = $this->themeDir . '/' . $name;
        if (!file_exists($chosenThemeDir)) {
            throw new InvalidArgumentException(
                sprintf('Invalid theme "%s" in directory %s', $name, $this->themeDir)
            );
        }

        return new Theme($chosenThemeDir);
    }
}