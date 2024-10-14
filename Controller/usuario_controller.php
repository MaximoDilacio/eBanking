<?php

    require 'Model/usuario_model.php';
   
    function verLogin(){
        include 'View/inicio/principal.php';
    }

    function login(){

        include 'View/inicio/principal.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();

            $datosUser = $user->login(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
            
            if($datosUser){
                
                session_start();

                $_SESSION['user_id'] = $datosUser['ID_Usuario'];
                $_SESSION['nombre'] = $datosUser['Nombre'];

                header ('Location: index.php?controller=home&action=Home');
            }else{
                echo 'no se pudo loguear';
            }
        }
    }


    function register(){
        include 'View/register.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();
            
            $datosUser = $user->register(htmlspecialchars($_POST['nombre']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));

            if($datosUser){
                header('Location: index.php?controller=usuario&action=login');
            }
         
        }
    }

    function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=productos&action=verPaginaPrincipal');
        exit();
    }



    function verCuenta(){
        if(session_status() === PHP_SESSION_NONE) session_start();
        $user = new User();
        $cuentasUsuario = $user->verCuentas();
        include 'View/mi_cuenta_view.php';
    }

    function transferir(){
        include 'View/transferir_view.php';
    }


    function movimientos(){
        include 'View/movimiento_view.php';
    }