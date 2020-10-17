<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overall</title>
</head>
<body>

<nav class="nav nav-pills nav-fill" style="border:outset;padding: 0 25px;">
<a class="navbar-brand" href="Catalogo.php">
    <img src="../img/imgEnca/photo5006105819296671891.png" width="80" height="50" class="d-inline-block align-top" alt="" loading="lazy">
    <!-- Overall -->
  </a>
  <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  <a class="nav-link" style="color:black;" href="nuestrosProductos.php">Nuestros Productos</a>
  <a class="nav-link" style="color:black;" href="#">Nuestras Ferreterias</a>
  <!-- <a class="nav-link" style="color:black;" href="#">Acerca de Nosotros</a> -->
  <a class="nav-link" style="color:black;" href="#">Contacto</a>
  <a class="nav-link" style="color:black;" href="login.php"><span class="badge badge-light"><?php 
  
    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
  ?></span><img width="30" height="30" src="../img/carrito-de-compras.png"></a>
  <!-- <a class="nav-link" style="color:black;margin: 0px;padding: 0px;" href="#"><span class="badge badge-light">0</span><img style="padding: 0px;" width="30px" height="30px" src="img/carrito-de-compras.png" alt="">Link</a> -->
  <a class="flex-sm-fill text-sm-center nav-link" style="color:black;" href="../Vistas/login.php"><button type="button" style="margin:0px; box-shadow: 0px 0px 3px #848484;padding:5px;" class="btn btn-warning rounded-circle" >Iniciar Sesion</button></a> 
</nav>
<br>
    
</body>
</html>