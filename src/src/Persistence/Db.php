<?php

namespace Application\Persistence;

use PDO;

class Db
{
    protected static $db;

    public static function getDb()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        ];

        if (self::$db === null) {
            self::$db = new PDO(
                'mysql:host=mysql;dbname=test',
                'test',
                '123456',
                $options
            );

            self::$db->query('SET NAMES utf8');
        }

        return self::$db;
    }
}