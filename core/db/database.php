<?php

class Database
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'news';
    private const DB_USER = 'root';
    private const DB_PASS = 'root';

    public static function dbInstance(): PDO
    {
        static $db;

        if ($db === null) {
            $db = new PDO(
                'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
                self::DB_USER,
                self::DB_PASS,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
            $db->exec('SET NAMES UTF8');
        }

        return $db;
    }

    public static function dbCheckError(PDOStatement $query): bool
    {
        $errInfo = $query->errorInfo();

        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }

        return true;
    }
}