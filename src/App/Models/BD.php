<?php

namespace App\Models;

use PDO;

class BD
{
   public static $servename = "db";
   public static $username = "root";
   public static $password = "root";
   public static $dbname = "GA";
   
// conexão Bd
public static function connect(){
   
    $conn = new PDO("mysql:host=".self::$servename.";dbname=".self::$dbname, self::$username, self::$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
    $conn->exec("set names utf8");
    return $conn;
}

}
