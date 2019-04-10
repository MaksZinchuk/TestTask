<?php

namespace app\components;

use PDO;
use PDOException;

class Db
{

    public static function getConnection()
    {
        try{
            $paramsPath = ROOT . '/config/db_params.php';
            $params = include($paramsPath);
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

            $db = new PDO($dsn, $params['user'], $params['password']);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;

        } catch (PDOException $e) {
            return false;
        }

    }
}