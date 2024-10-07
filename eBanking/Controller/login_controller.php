<?php
    require_once './Model/usuario_model.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombreUser = htmlspecialchars($_POST['nombreUsuario']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $cookie_name = "nombreUsuario";
        $cookie_value = $nombreUser;
    
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 día

        if (!empty($email) && !empty($password)) {

            $host = 'localhost';
            $user = 'root';
            $dbPassword = '';
            $dbname = 'ebanking_project';

            $newUser = new Usuario($host, $user, $dbPassword, $dbname);
            $userLogin = $newUser->login($email, $password);
            
            if ($userLogin) {
                session_start();
                $_SESSION['user_id'] = $userLogin['id'];

                sleep(1);
                header('Location: index.php?controller=home&action=Home');
                exit();
            }else{
                echo '<script>alert("Credenciales Incorrectas. Inténtalo nuevamente.");</script>';
            }

        }
    }   
?>
