<?php

//session_start();

include '../Vistas/carrito.php';
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Vistas/login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Carrito</title>
</head>
<body style="background: url(../img/decarga2.png) no-repeat center center fixed;">
    <div class="container-fluid">

    <?php include '../Vistas/encabezado.php'; ?>

    <br>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@.</h1>
        
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Cambia tu contraseña</a>
        <!-- <a href="logout.php" class="btn btn-danger">Cierra la sesión</a> -->
    </p>
    <h3>Listas del carrito</h3>
        <?php if (!empty($_SESSION['CARRITO'])) { ?>
    <table class="table table-bordered " style="background:white;">
        <tbody>
            <tr class="thead-dark">
                <th width="40%">Descripcion</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="5%">--</th>
            </tr>
            <?php $total=0; ?>
            <?php foreach($_SESSION['CARRITO'] as $indice => $producto) { ?>
            <tr>
                <td width="40%"><?php echo $producto['nombre']?></td>
                <td width="15%" class="text-center"><?php echo $producto['cantidad']?></td>
                <td width="20%" class="text-center">$<?php echo $producto['precio']?></td>
                <td width="20%" class="text-center">$<?php echo number_format($producto['precio'] * $producto['cantidad'],2 );?></td>
                <td width="5%">
                
                 <form action="" method="post">
                     <input type="hidden" name="id"  id="id" value="<?php echo $producto['id'];?>">
                 <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                 </form>
                 
                
                </td>
            </tr>
            <?php $total=$total+($producto['precio']*$producto['cantidad']); ?>
            <?php } ?>
            <tr>
                <td colspan="3" align="right"><h3>Total</h3></td>
                <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
                <td></td>
            </tr>
            <tr>
              <td colspan="5">
              <form action="cotizar.php" method="post">
              <div class="alert alert-primary" role="alert">
              <div class="form-group">
                   <label for="my-input">Correo de contacto:</label>
                   <input id="emial" name="email" class="form-control" type="email" placeholder="Por favor escribe tu correo" required>
               </div>
               <small id="emailHelp" class="form-text text-muted">
               Los productos se enviaran a este correo
               </small>
              </div>
              <button class="btn btn-success float-right" name="btnAccion" value="proceder" type="submit">Proceder a cotizar</button>
              </form>

              </td>
            </tr>
        </tbody>
    </table>
        <?php } else { ?>
            <div class="alert alert-success">
                No hay productos en el carrito...
            </div>

        <?php } ?>

    </div>

    <?php include '../Vistas/footer.php';?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>


