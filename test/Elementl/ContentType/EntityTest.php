<?php

namespace Elementl\ContentType;

use Elementl\ContentType\Field\Checkbox;
use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    public function testName()
    {
        $entity = new Entity('name');

        $this->assertSame('name', $entity->getName());

        $entity->setName('another');

        $this->assertSame('another', $entity->getName());
    }

    public function testSetFields()
    {
        $field = new Checkbox('is_active');

        $entity = new Entity('entity', [$field]);

        $this->assertSame($field, $entity->getFields()[0]);

        $field2 = new Checkbox('is_disabled');

        $entity->addField($field2);

        $this->assertSame($field, $entity->getFields()[0]);
        $this->assertSame($field2, $entity->getFields()[1]);

        $entity->setFields([$field2]);

        $this->assertSame($field2, $entity->getFields()[0]);
    }

    public function testGetSql()
    {
        $entity = new Entity('entity');

        $this->assertSame(
            'CREATE TABLE IF NOT EXISTS entity (id INTEGER PRIMARY KEY AUTOINCREMENT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)',
            $entity->getSql()
        );

        $entity->addField(new Checkbox('is_active'));

        $this->assertSame(
            'CREATE TABLE IF NOT EXISTS entity (id INTEGER PRIMARY KEY AUTOINCREMENT, is_active TINYINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)',
            $entity->getSql()
        );

        $entity->addField(new Checkbox('is_disabled'));

        $this->assertSame(
            'CREATE TABLE IF NOT EXISTS entity (id INTEGER PRIMARY KEY AUTOINCREMENT, is_active TINYINT, is_disabled TINYINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)',
            $entity->getSql()
        );
    }
}
