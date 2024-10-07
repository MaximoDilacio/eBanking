<?php
require_once '../Model/usuario.model.php';

function register(){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreUser = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $nombreValid = "/^[a-zA-Z\s]+$/";
        $emailValid = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        
        if (preg_match($nombreValid, $nombreUser) && preg_match($emailValid, $email)) {
            if (!empty($email) && !empty($password)) {
                $host = 'localhost';
                $user = 'root';
                $passwordDb = '';
                $dbname = 'ebanking_project';
                
                $usuario = new Usuario($host, $user, $passwordDb, $dbname);
                
                $resultado = $usuario->register($nombreUser, $email, $password);
                
                if ($resultado === "Registro exitoso.") {
                    header("Location: ../View/login.php");
                    exit();
                } else {
                    echo '<script>alert("' . $resultado . '");</script>';
                }
            } else {
                echo '<script>alert("Los campos están vacíos.");</script>';
            }
        } else {
            echo '<script>alert("Los campos contienen caracteres no permitidos.");</script>';
        }
    }
    
}
?>
