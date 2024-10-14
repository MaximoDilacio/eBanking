

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferir</title>
    <link rel="stylesheet" href="assets/css/home.css">
 
 
</head>
<body>


<?php 
        include 'home.header.php';
?>



<div class="contentTransferir">
    <div class="headerTransferir">
        <h2>Transferir</h2>
    </div>

    <div class="midTransferir">
        <form action="">
            <div class="header-form">
                <input type="text" name="" id="destino" placeholder="Ingrese el numero de cuenta destinatario">
                <label for="destino">- 00001</label>
            </div>

            <div class="mid-form">
                <input type="number" name="" id="" placeholder="Ingrese monto a transferir ($)" min="150">
            </div>

            <div class="mid-form2">
                <input type="text" id = "" placeholder = "Concepto">
            </div>

            <div class="footer-form">
                <input type="password" name="" id="" required placeholder="Ingrese su contraseña">
            </div>

            <input type = "submit" id = "btnFormTransfer" value = "Transferir">
        </form>
    </div>
</div>

</body>
</html>
