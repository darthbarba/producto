<?php

class Database
{
    private static $db;
    private static $user = 'root';
    private static $password = '';
    private static $host = 'localhost';
    private static $database = 'institute';

    //metodo estad¡tico para la conexion
    public static function Connect()
    {
        //usa valores de las variables ??
        $connectionString = 'mysql:host='.self::$host.';dbname='.self::$database.'; charset=utf8';
        //nuevo objeto
        self::$db = new PDO($connectionString, self::$user, self::$password);
        //atributos de pdo
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return self::$db;
    }
}




?>