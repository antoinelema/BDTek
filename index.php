<?php

/* 
 *
 */
    $action ='accueil';
    if (isset($_GET['action'])){
        $action = $_GET['action'];
//        var_dump($_GET);
    }

    //include 
    require 'DAO/ConnectionManager.dao.php';
    require 'DAO/BdManager.dao.php';
    require 'modele/model.inc.php';
    require 'DAO/CommentairesManager.dao.php';
    require 'objet/BD.class.php';
    require 'objet/Commentaire.class.php';
    
     //recuperation des parametres
     require 'param/param.php';
    
    //img
     $tOBds = BdManager::getAllOBd(); //tableau d'objet bd

//   var_dump($tOBds);
//         var_dump($_POST);
    $badpassword = FALSE;
    if (isset($_POST['userLogin'])){
        
        $userLogin = $_POST['userLogin'];
        $userPassword = $_POST['userPassword'];
        
        if(($userLogin == $login)&&($userPassword == $password)){
            session_start();
            
        }else{
            $badpassword = TRUE;
            
        }
    }
        
    //etapes et traitements
    switch ($action){
        case 'accueil':
            $titreSite = 'BDTeK';
            $titrePage = 'Accueil';
            include 'vues/view_header.php';
            include 'vues/view_accueil.php';
            include 'vues/view_footer.php';
            break;
        
        case 'afficheBD':            
            $titreSite = 'BDTeK';
            $titrePage = 'bdTitre';
            include 'vues/view_header.php';
            include 'vues/view_afficheBD.php';
            include 'vues/view_footer.php';
            break;
        

    }
        