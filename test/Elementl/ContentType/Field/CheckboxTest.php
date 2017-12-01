<?php

namespace Elementl\ContentType\Field;

use PHPUnit\Framework\TestCase;

class CheckboxTest extends TestCase
{
    public function testName()
    {
        $checkbox = new Checkbox('is_active');

        $this->assertSame('is_active', $checkbox->getName());

        $checkbox->setName('is_disabled');

        $this->assertSame('is_disabled', $checkbox->getName());
    }

    public function testGetSql()
    {
        $checkbox = new Checkbox('is_active');

        $this->assertSame(
            'is_active TINYINT',
            $checkbox->getSql()
        );
    }
}
