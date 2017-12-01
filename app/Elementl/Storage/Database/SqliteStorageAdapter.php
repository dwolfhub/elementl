<?php

namespace Elementl\Storage\Database;

use PDO;

/**
 * Class SqliteStorageAdapter
 * @package Elementl\storage\Database
 */
class SqliteStorageAdapter implements StorageAdapterInterface
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * SqliteStorageAdapter constructor.
     *
     * @param string $dir
     */
    public function __construct(string $dir)
    {
        $this->pdo = new PDO('sqlite:' . $dir . '/elementl.db');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $table
     * @param array $data
     *
     * @return int
     */
    public function insert(string $table, array $data)
    {
        $bindings = [];
        foreach ($data as $key => $value) {
            $bindings[':' . $key] = $value;
        }

        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_keys($bindings));

        $stmt = $this->pdo->prepare("INSERT INTO `$table` ($columns) VALUES ($values);");

        $stmt->execute($bindings);

        return (int)$this->pdo->lastInsertId();
    }

    /**
     * @param string $sql
     *
     * @return int effected rows
     */
    public function raw(string $sql): int
    {
        return $this->pdo->exec($sql);
    }
}