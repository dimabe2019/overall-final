<?php
  include '../Utils/conexion.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Ferreterias</title>
</head>
<body style="background: url(../img/decarga2.png) no-repeat center center fixed;">

  <div class="container-fluid">
    <?php include "encabezado.php"; ?>

    <!-- Columna 1-->
    <div class="container-fluid">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="../img/imgEnca/photo5006105819296671891.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Quienes Somos?</h5>
                    <p class="card-text">Somos una empresa colombiana, comprometida con sus clientes en satisfacer las necesidades de servicios de búsqueda y compra de materiales de construcción, con los más estrictos estándares de calidad y confiabilidad
                    Brindamos un servicio de establecimientos empresariales con suministros e insumos para el sector de la construcción que busca cambiar el antiguo concepto de búsqueda, cotización y compra ofreciendo una plataforma con el fin de ambientar servicio de alta calidad al igual que un establecimiento de venta de materiales de construcción, pero en la comodidad de la empresa donde labora el personal.</p>
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <?php include '../Vistas/footer.php';?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>