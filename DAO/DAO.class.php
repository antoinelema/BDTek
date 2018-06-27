<?php

/* 
 *
 */

class DAO{
   
    
    static function conexion($hote,$port,$nom_bd,$utilisateur,$mdp){
        $PARAM_dsn = 'mysql:host='.$hote.'; dbname='.$nom_bd.'';
        $connexion = new PDO("mysql:host=localhost; dbname=parcauto; charset=utf8",$utilisateur, $mdp, array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
        return $connexion;
    }
    
}