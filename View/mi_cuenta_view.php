<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

    <?php 
        include 'home.header.php';
    ?>


    

<div class="content-cuenta">
            <div class="header-cuenta">
                <h2><i class="bi bi-person-bounding-box"></i> <?php echo $_SESSION['nombre']?></h2> 
            </div>

            <div class="datos-cuenta">
                <table>
                    <tr id="header-table">
                        <td>Cuenta</td>
                        <td>Moneda</td>
                        <td>Saldo</td>
                    </tr>

                    <tr id="footer-table">
                        
                        <?php foreach($cuentasUsuario as $cuenta) {?>
                        <td><?php echo $cuenta['Num_Cun']; ?></td>
                        <td>$</td>
                        <td><?php echo $cuenta['Saldo']; ?></td>
                        <?php }?>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>

</body>
</html>
