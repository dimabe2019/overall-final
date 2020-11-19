<?php

class ConexionDB {

    public function getConexion() {
        try{
        $cnx = new PDO('mysql:host=localhost;port=3306;dbname=overall','root','DrVM99');
        return $cnx;
        }catch(PDOException $ex) {
            echo 'Error conectando a la BBDD. '.$ex->getMessage();
        }
}

} 
