<?php
namespace database;

use PDO;

class DatabaseConnector
{

    private static $instance;
    private static $pdoConnection;

    private function __construct()
    {
        $cfg      = parse_ini_file('../config/app.ini', true);
        $host     = $cfg['database']['host'];
        $name     = $cfg['database']['name'];
        $charset  = $cfg['database']['charset'];
        $username = $cfg['database']['username'];
        $password = $cfg['database']['password'];
        $dsn      = "mysql:host=$host;dbname=$name;charset=$charset";

        self::$pdoConnection = new PDO($dsn, $username, $password);
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance(): self
    {
        if ( ! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return self::$pdoConnection;
    }
}