<?php
namespace Elementl\Storage\Database;

use PDO;

/**
 * Class Connection
 * @package Elementl\Storage\Database
 */
class Connection
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * @param $dir
     */
    public function __construct($dir)
    {
        $this->pdo = new PDO('sqlite:' . $dir . '/elementl.db');
    }
}