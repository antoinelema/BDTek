<?php

/* 
 *
 */
    $action ='accueil';
    
    //recuperation des parametres
    //img
    $directory = 'images';
    $img_directory = array_diff(scandir($directory), array('..', '.','Thumbs.db'));
    
    
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
        