<?php
// Verificar si la cookie 'nombreUsuario' está definida
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
        <h2><button id = "btnCuenta"><i class="bi bi-person-bounding-box"></i> Mi Cuenta</button></h2>
    
        <ul>
        <li><button href="" id = "btnTransferir"><i class="bi bi-arrow-left-right"></i> Transferir</button></li>
        <li><button href="" id = "btnMovimientos"><i class="bi bi-card-list"></i> Movimientos</button></li>
        <form action="">
            <li><input type = "submit" id = "btnCerrarSesion" value= "Cerrar Sesión"></li>
        </form>

        </ul>
    </div>

    
    <div class="footer-aside">
        <p>@eBanking</p>
    </div>

</aside>


<?php require_once 'home.header.php'; ?>
<div id="content-home">
    <h2>¡Bienvenido, <?php echo $nombreUsuario; ?>!</h2>
</div>
<?php require_once 'home.header.php'; ?>

    