<?php

namespace Elementl\Storage\Database;

interface StorageAdapterInterface
{
    /**
     * @param string $table
     * @param array $data
     *
     * @return bool
     */
    public function insert(string $table, array $data);

    /**
     * @param string $sql
     *
     * @return int
     */
    public function raw(string $sql): int;
}