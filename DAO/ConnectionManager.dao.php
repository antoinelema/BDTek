<?php

/*
 *
 */


class ConnectionManager{


    static function conexion(){
        if (file_exists('Param/param.php')){
            require 'Param/param.php';
        }else{
            require '../Param/param.php';
        }



        $PARAM_dsn = 'mysql:host='.$PARAM_hote.'; dbname='.$PARAM_nomBDD.'; charset=utf8';
        $connexion = new PDO($PARAM_dsn,$PARAM_user, $PARAM_mdp, array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
        return $connexion;
    }

}
