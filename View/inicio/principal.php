<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | eBanking</title>
    <link rel="stylesheet" href="assets/css/principal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="content-form">
   <div class="content-form-header">
       <img src="assets/img/eLogo.png" alt="" >
    </div>
       
    <form action="index.php?controller=usuario&action=login" method = "post">
        <input type="text" name="nombreUsuario" id="nombreUsuario"  required placeholder = "Ingrese su Nombre y Apellido">
        <input type="text" name="email" id="email"  required placeholder = "Ingrese su email">
        <input type="password" name="password" id="password" minlength = "8" maxlength = "15" required placeholder = "Ingrese su contraseña">
        <input type="submit" value = "Ingresar" id = "btnForm">
    </form>

    
    <div class="content-form-footer">
        <small><a href="">Olvidé Mi Contraseña <i class="bi bi-lock"></i></a></small>
        <p>¿Aún no tienes cuenta de eBanking? <a href="index.php?controller=usuario&action=register">Registrate</a></p>
    </div>

    <small></small>
</div>

    
</body>
</html>
