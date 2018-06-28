<?php

/* 
 *
 */


class ConnectionManager{
   
    
    static function conexion(){
        $tParams = parse_ini_file('param/param.ini');
        $PARAM_hote = $tParams['hote'];
        $PARAM_port = $tParams['port'];
        $PARAM_nomBDD = $tParams['nom_bdd'];
        $PARAM_user = $tParams['utilisateur'];
        $PARAM_mdp = $tParams['mot_passe'];
        
        
        $PARAM_dsn = 'mysql:host='.$PARAM_hote.'; dbname='.$PARAM_nomBDD.'; charset=utf8';
        $connexion = new PDO($PARAM_dsn,$PARAM_user, $PARAM_mdp, array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
        return $connexion;
    }
    
}