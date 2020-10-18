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
    <title>Nuestros Productos</title>

    <script src="../js/jquery-3.2.1.js"></script>
	<script src="../js/script.js"></script>
</head>
<body style="background: url(../img/decarga2.png) no-repeat center center fixed;">
    <div class="container">

   <?php include '../Vistas/encabezado.php';?>

  <?php if($mensaje != "") { ?>
   <div class="alert alert-success">
   	<?php echo $mensaje;//print_r($_POST);?> 
	   <a href="mostrarCarrito.php" class="badge badge-success">Ver Carrito</a>
   </div>
  <?php } ?>

   <div class="row">
	   <?php
			$cnx = new ConexionDB();
			$cn=$cnx->getConexion();

			$res=$cn->prepare("select * from nuestrosproductos");
			$res->execute();
			$listarProductos=$res->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listarProductos);
	   ?>

	   <?php  foreach($listarProductos as $producto){  ?>

		<div class="col-3">
		   <div class="card">
			   <img title="<?php echo $producto['Nombre'];?>" alt="<?php echo $producto['Nombre'];?>" data-toggle="popover" data-content="<?php echo $producto['Descripcion'];?>" data-trigger="hover" class="card-img-top" src="../img/imgProd/<?php echo $producto['Imagen'];?>" alt="">
			   <div class="card-body">
				   <span><?php echo $producto['Nombre'];?></span>
				   <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>
				   <p class="card-text">Descricion</p>
				   <form action="" method="post">
					<!-- hidden para que se oculten los elementos -->
					   <input type="hidden" name="id" id="id" value="<?php echo $producto['ID'];?>">
					   <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['Nombre'];?>">
					   <input type="hidden" name="precio" id="precio" value="<?php echo $producto['Precio'];?>">
					   <input type="number" name="cantidad" id="cantidad" value="<?php echo 1;?>"><br><br>
				   <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
				   </form>
			   </div>
		   </div>
	   </div>


	   <?php } ?>
	   
	   



	   
   </div>



<!-- <div class="wrap">
		<h1>Escoge tus productos</h1>
		<div class="store-wrapper">
			<div class="category_list">
				<a href="#" class="category_item" category="all">Todo</a>
				<a href="#" class="category_item" category="construccion">Construccion</a>
				<a href="#" class="category_item" category="pinturas">Pinturas</a>
				<a href="#" class="category_item" category="maquinaria">Maquinarias</a>
				<a href="#" class="category_item" category="pisos">Pisos</a>
				<a href="#" class="category_item" category="herramientas">Herramientas</a>
			</div>
			<section class="products-list">
				<div class="product-item" category="herramientas">
					<img src="../img/imgProd/herramientasMenores.jpg" alt="" >
					<a href="#">Herramientas Menores</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalHerramientas" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="maquinarias">
					<img src="../img/imgProd/plumaGrua.jpg" alt="" >
					<a href="#">Pluma Grua</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="construccion">
					<img src="../img/imgProd/Pulidora de 6 y 9 pulgadas.jpg" alt="" >
					<a href="#">Pulidora de 4" y 9"</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="maquinaria">
					<img src="../img/imgProd/Minicargador con martillo.jpg" alt="" >
					<a href="#">Minicargador</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="construccion">
					<img src="../img/imgProd/cortadora.jpg" alt="" >
					<a href="#">Cortadora</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="construccion">
					<img src="../img/imgProd/sierraCortadora.jpg" alt="" >
					<a href="#">Sierra Cortadora</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="maquinaria">
					<img src="../img/imgProd/cortaPavimento.jpg" alt="" >
					<a href="#">Corta Pavimento</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="herramienta">
					<img src="../img/imgProd/ranaCompactadora.jpg" alt="" >
					<a href="#">Rana Compactadora</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="maquinaria">
					<img src="../img/imgProd/mezcladora.jpg" alt="" >
					<a href="#">Mezcladora</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="pisos">
					<img src="../img/imgProd/allanadora.jpg" alt="" >
					<a href="#">Allanadora</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="pinturas">
					<img src="../img/imgProd/rotomartillo.jpg" alt="" >
					<a href="#">Rotomartillo</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
				<div class="product-item" category="maquinaria">
					<img src="../img/imgProd/demoledor.jpg" alt="" >
					<a href="#">Demoledor</a>
					<button type="button" style="margin: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="" >Agregar</button>
				</div>
			</section>
		</div>
    </div>
    
</div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalHerramientas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mostrar">
	   <strong>Herramientas Menores</strong>
	   <hr>
	   <img src="../img/imgProd/herramientasMenores.jpg" alt="">
	   <strong>Precio: $55.000</strong>
	   <br><br>
	   Ingrese la cantidad:
	   <input type="number" min="1" max="100" value="1" name="txtCan">
	   <br><br>
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      <button type="button" class="btn btn-primary">Agregar a carrito</button>
      </div> -->
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    <!--</div>
  </div> -->
</div> 

<!-- fin de Modal --> 

    <script>
		$(function () {
           $('[data-toggle="popover"]').popover()
        })
	</script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>