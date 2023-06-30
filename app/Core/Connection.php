<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Core;

use PDO;
use PDOException;

class Connection {

    protected static $instance;

    private static $username = DB_USER;

    private static $password = DB_PASS;

    private static $dbName = DB_NAME;

    private static $dbHost = DB_HOST;

    private function __construct()
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s', self::$dbHost, self::$dbName);

        try {
            self::$instance = new PDO($dsn, self::$username, self::$password,  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo "MySql Connection Error: " . $e->getMessage();die;
        }
    }

    public static function getInstance(): PDO
    {
        if (!self::$instance) {
            new Connection();
        }

        return self::$instance;
    }

}