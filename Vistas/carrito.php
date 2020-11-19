<?php

session_start();

$mensaje ="";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {
        case 'Agregar':
            
            if (is_numeric($_POST['id'])) {
                $id=$_POST['id'];
                $mensaje .= "Ok id correcto".$id."<br>";
            }else {
                $mensaje .="Upss... id incorrecto".$id;
            }

            if(is_string($_POST['nombre'])) {
                $nombre = $_POST['nombre'];
                $mensaje .= "Ok Nombre correcto".$nombre."<br>";

            } else{
                $mensaje .= "Upss.. algo pasa con el nombre";break;
            }

            if (is_numeric($_POST['precio'])) {
                $precio = $_POST['precio'];
                $mensaje .= "Ok precio correcto".$precio."<br>";
            }else{
                $mensaje .= "Upps... algo pasa con el precio"; break;
            }

            if (is_numeric($_POST['cantidad'])) {
                $cantidad = $_POST['cantidad'];
                $mensaje .= "Ok Cantidad correcto".$cantidad;
            }else{
                $mensaje .= "Upps... algo pasa con la cantidad"; break;
            }

            if(!isset($_SESSION['CARRITO'])){

                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio

                );
                $_SESSION['CARRITO'][0] = $producto; 
                $mensaje = "Producto agregado al carrito";

            } else {

                $idProductos = array_column($_SESSION['CARRITO'],"id");

                if(in_array($id,$idProductos)) {
                      echo "<script>alert('El producto ya ha sido seleccionado');</script>";
                      $mensaje = "";
                } else {

                $NumeroProductos = count($_SESSION['CARRITO']); //Contabilizar productos en el carrito
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio

                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                $mensaje = "Producto agregado al carrito";
            
              }
            }

            //$mensaje = print_r($_SESSION, true);
            

        break;

        case 'Eliminar':
            if(is_numeric($_POST['id'])) {
               $id=$_POST['id'];

               foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                   if ($producto['id'] == $id) {
                       unset($_SESSION['CARRITO'][$indice]);
                       echo "<script>alert('Elemento borrado...');</script>";
                   }
               }
            } else {
                $mensaje .="Upss... id incorrecto".$id."<br>";
            }
        break;
        
        default:
            # code...
            break;
    }
    
}
?>