<?php

include '../Utils/conexion.php';
include '../Vistas/carrito.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
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
         $Correo=$_POST['email']; 

         foreach ($_SESSION['CARRITO'] as $indice => $producto) {
             
            $total = $total + ($producto['PRECIO']*$producto['CANTIDAD']);
         }

         $cnx = new ConexionDB();
			$cn=$cnx->getConexion();

			$res=$cn->prepare("INSERT INTO `ventas`(`ID`, `ClaveTransaccion`, `PayplaDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES (NULL, :ClaveTransaccion,'', NOW(), :Correo,:Total,'pendiente');");
            $res->bindParam(":ClaveTransaccion",$SID);
            $res->bindParam(":Correo",$Correo);
            $res->bindParam(":Total",$total);
            $res->execute();
            $idVenta=$cn->lastInsertId();
            //$listarProductos=$res->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
             
            $cnx = new ConexionDB();
            $cn=$cnx->getConexion();
            
            $res=$cn->prepare("INSERT INTO `detalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES (NULL,:IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, 0);"); 
              
                $res->bindParam(":IDVENTA",$idVenta);
                $res->bindParam(":IDPRODUCTO",$producto['ID']);
                $res->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
                $res->bindParam(":CANTIDAD",$producto['CANTIDAD']);
                $res->execute();

            }

            echo "<h3>".$total."</h3>";
     }
    
    ?>

    <div class="jumbotron">
        <h1 class="display-4">Title</h1>
        <p class="lead">Subtitle</p>
        <hr class="my-4">
        <p>Content</p>
    </div>
    
    
    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>