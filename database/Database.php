<?php

namespace Database;

use PDO;

class Database
{
    private static $instance; // Singleton instance
    private $connection;

    private function __construct($config)
    {
        $dsn = "mysql:host={$config->get('database_host')};dbname={$config->get('database_name')}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->connection = new PDO($dsn, $config->get('database_user'), $config->get('database_password'), $options);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
