<?php

class ConexionDB {

    public function getConexion() {
        try{
        $cnx = new PDO('mysql:host=localhost;port=3307;dbname=pruebaferreteria','root','');
        return $cnx;
        }catch(PDOException $ex) {
            echo 'Error conectando a la BBDD. '.$ex->getMessage();
        }
}

} 
