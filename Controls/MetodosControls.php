<?php

include '../Utils/conexion.php';


class MetodosControls
{
    public function ListarProductos(){
        $cnx = new ConexionDB();
        $cn=$cnx->getConexion();

        $res=$cn->prepare("select * from productos");
        $res->execute();

         foreach ($res as $row) {
            $lista[] =$row;
        } 
        return $lista; 
    }


    public function ListarProductosCod($cod){
        $cnx = new ConexionDB();
        $cn=$cnx->getConexion();

        $res=$cn->prepare("select * from productos where codpro=$cod");
        $res->execute();

         foreach ($res as $row) {
            $lista[] =$row;
        } 
        return $lista; 
    }




}


