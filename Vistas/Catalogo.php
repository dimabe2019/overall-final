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
    <title>Catalogo</title>
</head>
<body style="background: url(../img/decarga2.png) no-repeat center center fixed;">

<div class="container-fluid">

  <?php include "encabezado.php"; ?>

  <!-- Inicio del carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/prod1.jpg" width="200" height="380" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/prod2.jpg" width="200" height="380" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/prod3.jpg" width="200" height="380" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- fin del carousel -->

  <!-- Columna 1-->
  <div class="container-fluid" style="margin:0px;background: #F9F9F9;padding: 10px 20px;border-radius: 5px;">
    <h2 style="padding-top:1.2rem; padding-bottom: 1.2rem;" align="center">PRODUCTOS</h2>
    <?php
      $cnx = new ConexionDB();
      $cn=$cnx->getConexion();

      $res=$cn->prepare("select * from nuestrosproductos");
      $res->execute();
      $listarProductos=$res->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
      <div class="row">
        <?php  foreach($listarProductos as $producto){  ?>
          <div class="col-md-4">
            <div class="card mb-4">
              <div style="width: 100%;">
                <img class="img-fluid" style="width: 180px; height: 200px; padding-top: 20px;" title="<?php echo $producto['Nombre'];?>" alt="<?php echo $producto['Nombre'];?>" data-toggle="popover" data-content="<?php echo $producto['Descripcion'];?>" data-trigger="hover" src="data:image/png;base64,<?php echo base64_encode( $producto['Imagen']);?>">
              </div>
              <div class="card-body">
                <span><?php echo $producto['Nombre'];?></span>
                <!-- <h5 class="card-title">$<?php// echo $producto['Precio'];?></h5> -->
                <form action="" method="post">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="enviar(<?php echo $producto['ID'];?>)" >Ver</button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mostrar">
        ...
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>

<!-- fin de Modal -->

<?php include '../Vistas/footer.php';?>

<script>

  var resultado = document.getElementById("mostrar");
  function enviar(c) {
  
    var xmlhttp;
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        resultado.innerHTML = xmlhttp.responseText;
      }

    }
    xmlhttp.open("GET","Detalle.php?cod="+c,true);
    xmlhttp.send();
    //location.href="Detalle.php?cod="+c;
  }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>