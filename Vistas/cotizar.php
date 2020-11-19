<?php

include '../Utils/conexion.php';
include '../Vistas/carrito.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Cotizar</title>
</head>
<body>
    <div class="container">
    
    <?php include '../Vistas/encabezado.php';?>


    <?php 
    
    if($_POST){
        $total=0;
        $SID = session_id();
        $email=$_POST['email']; 

        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            
        $total = $total + ($producto['precio']*$producto['cantidad']);
        }

        $cnx = new ConexionDB();
        $cn=$cnx->getConexion();

        $res=$cn->prepare("INSERT INTO `sales`(`id`, `claveTransaccion`, `fecha`, `total`, `email`, `status`, `paypalDatos`) VALUES (NULL, :claveTransaccion, NOW(), :total, :email,'pendiente', '');");
        $res->bindParam(":claveTransaccion",$SID);
        $res->bindParam(":email",$email);
        $res->bindParam(":total",$total);
        $res->execute();
        $idVenta=$cn->lastInsertId();
        //$listarProductos=$res->fetchAll(PDO::FETCH_ASSOC);
       


        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            
            $cnx = new ConexionDB();
            $cn=$cnx->getConexion();
            
            $res=$cn->prepare("INSERT INTO `salesdetails` (`id`, `sales_id`, `precioUnit`, `cantidad`, `descargado`) VALUES (NULL,:sales_id, :precioUnit, :cantidad, 0);"); 
            
            $res->bindParam(":sales_id",$idVenta);
            $res->bindParam(":precioUnit",$producto['precio']);
            $res->bindParam(":cantidad",$producto['cantidad']);
            $idDetalleVenta=$cn->lastInsertId();
            $res->execute();

        }

        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            $cnx = new ConexionDB();
            $cn=$cnx->getConexion();
        
            $res=$cn->prepare("INSERT INTO `salesdetailsproducts` (`salesdetails_id`, `products_id`) VALUES (:salesdetails_id, :products_id);");
            $res->bindParam(":salesdetails_id",$idDetalleVenta);
            $res->bindParam(":products_id",$producto['id']);
            $res->execute();
        
        }

     }
    
    ?>

    <div class="jumbotron text-center">
        <h1 class="display-4">¡Paso Final!</h1>
        <hr class="my-4">
        <p class="lead">Estas a punto de terminar la cotizacion por la cantidad de: 
            <h4>$<?php echo number_format($total,2); ?> </h4>
        </p>
        <p>Los productos podrán ser adquiridos una vez que se realice el pago correspondiente<br>
            <strong>(para aclaraciones: overall@gmail.com)</strong>
        </p>
        <button class="btn btn-primary" type="submit" name="cotizacion">Enviar cotización</button>
    </div>
    
    <?php include '../Vistas/footer.php';?>
    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>