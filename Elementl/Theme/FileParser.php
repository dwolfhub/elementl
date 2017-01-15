<?php
namespace Elementl\Theme;

use DOMDocument;
use DOMNode;
use DOMNodeList;
use Elementl\Theme\Tags\IncludeTag;
use Elementl\Theme\Tags\TagInterface;
use RuntimeException;

/**
 * Class FileParser
 * @package Elementl\Theme
 */
class FileParser
{
    /**
     * @var string
     */
    protected $themeDir;

    /**
     * FileParser constructor.
     * @param $themeDir
     */
    public function __construct($themeDir)
    {
        $this->themeDir = $themeDir;
    }

    /**
     * @param $fileName
     */
    public function parseFile($fileName)
    {
        if (!file_exists($this->themeDir . '/' . $fileName)) {
            throw new RuntimeException(
                sprintf('Invalid file name "%s" in theme settings.php file', $fileName)
            );
        }

        libxml_use_internal_errors(true);
        $domDocument = new DOMDocument();
        $domDocument->loadHTML(
            file_get_contents($this->themeDir . '/' . $fileName),
            LIBXML_NOWARNING
        );

        $includeTag = new IncludeTag();
        $includeTag->setThemeDir($this->themeDir);

        /** @var TagInterface $tag */
        foreach ([$includeTag] as $tag) {
            $domNodeList = $domDocument->getElementsByTagName($tag->getTagName());
            /** @var DOMNode $domNode */
            foreach ($domNodeList as $domNode) {
                $domDocumentFragment = $tag->parseDOMNode($domNode);
                $newDomNode = $domDocument->importNode($domDocumentFragment);
                $domNode->parentNode->replaceChild(
                    $newDomNode,
                    $domNode
                );
            }
        }

        return $domDocument;
    }
}