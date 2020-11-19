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
    <div class="container-fluid" style="margin:0px;background: #F9F9F9;padding: 10px 20px;border-radius: 5px;">
      <h2 style="padding-top:1.2rem; padding-bottom: 1.2rem;" align="center">NUESTROS ALIADOS</h2>
      <?php
        $cnx = new ConexionDB();
        $cn=$cnx->getConexion();

        $res=$cn->prepare("select * from stores");
        $res->execute();
        $listarFerreterias=$res->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="container">
        <div class="row">
          <?php  foreach($listarFerreterias as $ferreteria){  ?>
            <div class="col-md-4">
              <div class="card mb-4">
                <div style="width: 100%;">
                  <img class="img-fluid" style="width: 260px; height: 200px; padding-top: 20px;" title="<?php echo $ferreteria['name'];?>" alt="<?php echo $ferreteria['name'];?>" data-toggle="popover" data-trigger="hover" src="data:image/png;base64,<?php echo base64_encode( $ferreteria['image']);?>">
                </div>
                <div class="card-body">
                  <h5><?php echo $ferreteria['name'];?></h5>
                </div>
              </div>
            </div>
          <?php } ?>
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