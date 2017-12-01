<?php

namespace Elementl\ContentType\Field;

use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testName()
    {
        $checkbox = new Image('image_1');

        $this->assertSame('image_1', $checkbox->getName());

        $checkbox->setName('image_2');

        $this->assertSame('image_2', $checkbox->getName());
    }

    public function testGetSql()
    {
        $checkbox = new Image('image_1');

        $this->assertSame(
            'image_1 TEXT',
            $checkbox->getSql()
        );
    }
}
