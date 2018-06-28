<?php

/* 
 *
 */
    $action ='accueil';
    //include 
    require 'dao/connectionManager.dao.php';
    require 'dao/Bdmanager.dao.php';
    require 'modele/model.inc.php';
     //recuperation des parametres
    $tParams = parse_ini_file('param/param.ini');
    $DEBUG = $tParams['debug'];
    $cheminImages = $tParams['cheminImages'];
     getAllOBd();
   
    //img
    $tImage = array_diff(scandir($cheminImages), array('..', '.','Thumbs.db'));
    
        
    //etapes et traitements
    switch ($action){
        case 'accueil':
            $titreSite = 'BDTeK';
            $titrePage = 'Accueil';
            include 'vues/view_header.php';
            include 'vues/view_accueil.php';
            include 'vues/view_footer.php';
            break;
            
    }
        