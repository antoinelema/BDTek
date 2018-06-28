<?php

/* 
 * 
 */
require 'objet/BD.class.php';

function getAllOBd(){
    $tbd = array();
    
    try {
        $resultat = BdManager::getAllBd();
        $record = $resultat -> fetchall();
        
        foreach ($record as $ligne) {
            extract($ligne);
            $bd = new BD($bd_Id, $auteur, $bdImg, $bdResume, $titre);
            
            $tbd[]=$bd;
        }
        
    } catch (Exception $ex) {

    }
    return $tbd;
}