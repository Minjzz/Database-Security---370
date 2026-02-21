<?php

class Database {

    private $pdo;

    public function __construct() {

        $config = require __DIR__ . '/../config/database.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false, // Use real prepared statements
        ];

        $this->pdo = new PDO($dsn, $config['username'], $config['password'], $options);
    }

    public function getConnection() {
        return $this->pdo;
    }
}
