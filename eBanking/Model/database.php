<?php

    class Database{

        const servidor = "localhost";
        const user = "root";
        const dbname = "ebanking_project";
        const password = "";


        public static function Conectar(){
            try {
                $conexion = new PDO("mysql:host=".self::servidor.";dbname=".self::dbname.
                ";charset=utf8",self::user,self::password);

                $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conexion;
            } catch (PDOException $e) {
                return "Error ".$e->getMessage();
            }
        }
    }

?>