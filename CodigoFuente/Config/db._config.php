<?php

class Conexion
{
    private static $user = "root";
    private static $password = "";
    private static $host = "localhost:3307";
    private static $database_name = "practisoft";

    //Permite hacer una conexion PDO con la base de datos
    public static function conectar()
    {
        try {
            //code...
            return new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database_name, self::$user, self::$password);
        } catch (Exception $e) {
            //throw $th;
            echo "Ocurrio un error en la conexion<br>";
            echo $e->getMessage();
        }
    }
}
