<?php

/* 
 *
 */
    $action ='accueil';
    
    //recuperation des parametres
    $tParams = parse_ini_file('param/param.ini');
    $DEBUG = $tParams['debug'];
    $cheminImages = $tParams['cheminImages'];
    //img
    $img_directory = array_diff(scandir($cheminImages), array('..', '.','Thumbs.db'));
    
    
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
        