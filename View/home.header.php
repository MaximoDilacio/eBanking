<?php

if(session_status() === PHP_SESSION_NONE) session_start();
$nombreUsuario = isset($_COOKIE['nombreUsuario']) ? $_COOKIE['nombreUsuario'] : 'Invitado';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Home | eBanking</title>
</head>
<body>
    
<aside>
    <div class="header-aside">
        <img src="assets/img/eLogo.png" alt="">
    </div>

    <div class="mid-aside">
        <h2><a href="index.php?controller=usuario&action=verCuenta" id = "btnCuenta"><i class="bi bi-person-bounding-box"></i> Mi Cuenta</a></h2>
    
        <ul>
        <li><a href="index.php?controller=usuario&action=transferir" id = "btnTransferir"><i class="bi bi-arrow-left-right"></i> Transferir</a></li>
        <li><a href="index.php?controller=usuario&action=movimientos" id = "btnMovimientos"><i class="bi bi-card-list"></i> Movimientos</a></li>
        <form action="">
            <li><input type = "submit" id = "btnCerrarSesion" value= "Cerrar Sesión"></li>
        </form>

        </ul>
    </div>

    
    <div class="footer-aside">
        <p>@eBanking</p>
    </div>

</aside>
