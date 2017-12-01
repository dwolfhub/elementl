<?php

namespace Elementl\ContentType;

use Elementl\ContentType\Field\AbstractField;

/**
 * Class Entity
 * @package Elementl\ContentType
 */
class Entity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var AbstractField[]
     */
    protected $fields;

    /**
     * Entity constructor.
     *
     * @param string $name
     * @param AbstractField[] $fields
     */
    public function __construct(string $name, array $fields = [])
    {
        $this->name = $name;

        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        $columns = ['id INTEGER PRIMARY KEY AUTOINCREMENT'];

        foreach ($this->getFields() as $field) {
            $columns[] = $field->getSql();
        }

        $columns[] = 'created_at DATETIME NOT NULL';
        $columns[] = 'updated_at DATETIME NOT NULL';

        $columns = implode(', ', $columns);

        return "CREATE TABLE IF NOT EXISTS $this->name ($columns)";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return AbstractField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param AbstractField[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param AbstractField $field
     */
    public function addField(AbstractField $field)
    {
        $this->fields[] = $field;
    }

    /**
     * @return string
     */
    public function getReadableName()
    {
        $name = str_replace('elmtl_', '', $this->name);
        $name = str_replace('_', ' ', $name);
        $name = ucwords($name);

        return $name;
    }
}