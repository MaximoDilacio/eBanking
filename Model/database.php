<?php
    function getConnection(){
        $SERVIDOR = "localhost";
        $USER = "root";
        $DBNAME = "ebanking_project";
        $PASSWORD = "";
        
        try {
            // Crear la conexión con PDO
            $conexion = new PDO("mysql:host=$SERVIDOR;dbname=$DBNAME;charset=utf8", $USER, $PASSWORD);
            
            // Configurar PDO para que lance excepciones en caso de error
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Retornar la conexión si todo está bien
            return $conexion;
        } catch (PDOException $e) {
            // Mostrar el error (en producción sería mejor registrarlo en un log)
            echo "Error en la conexión: " . $e->getMessage();
            
            // Retornar null si hay un error
            return null;
        }
    }
?>
