<?php

session_start();

$mensaje ="";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {
        case 'Agregar':
            
            if (is_numeric($_POST['id'])) {
                $ID=$_POST['id'];
                $mensaje .= "Ok ID correcto".$ID."<br>";
            }else {
                $mensaje .="Upss... ID incorrecto".$ID;
            }

            if(is_string($_POST['nombre'])) {
                $NOMBRE = $_POST['nombre'];
                $mensaje .= "Ok Nombre correcto".$NOMBRE."<br>";

            } else{
                $mensaje .= "Upss.. algo pasa con el nombre";break;
            }

            if (is_numeric($_POST['precio'])) {
                $PRECIO = $_POST['precio'];
                $mensaje .= "Ok Precio correcto".$PRECIO."<br>";
            }else{
                $mensaje .= "Upps... algo pasa con el precio"; break;
            }

            if (is_numeric($_POST['cantidad'])) {
                $CANTIDAD = $_POST['cantidad'];
                $mensaje .= "Ok Cantidad correcto".$CANTIDAD;
            }else{
                $mensaje .= "Upps... algo pasa con la cantidad"; break;
            }

            if(!isset($_SESSION['CARRITO'])){

                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO

                );
                $_SESSION['CARRITO'][0] = $producto; 

            } else {

                $NumeroProductos = count($_SESSION['CARRITO']); //Contabilizar productos en el carrito
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO

                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;
            }

            $mensaje = print_r($_SESSION, true);





        break;
        
        default:
            # code...
            break;
    }
    
}
?>