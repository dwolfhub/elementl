<?php

namespace Elementl\ContentType\Field;

use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testName()
    {
        $checkbox = new Text('text_1');

        $this->assertSame('text_1', $checkbox->getName());

        $checkbox->setName('text_2');

        $this->assertSame('text_2', $checkbox->getName());
    }

    public function testGetSql()
    {
        $checkbox = new Text('text_1');

        $this->assertSame(
            'text_1 TEXT',
            $checkbox->getSql()
        );
    }
}
