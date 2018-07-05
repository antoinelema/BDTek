<?php

/*
 *Index du site, determine quelle fenetre affiché
 */
    //recuperation des parametres
     require 'Param/param.php';

     //include
    require 'DAO/ConnectionManager.dao.php';
    require 'DAO/BdManager.dao.php';
    require 'DAO/CommentairesManager.dao.php';
    require 'modele/model.inc.php';
    require 'objet/BD.class.php';
    require 'objet/Commentaire.class.php';

     session_start();

     if ($DEBUG){
       echo 'var dump de $_GET:';
       var_dump($_GET);

       echo 'var dump de $_POST:';
       var_dump($_POST);

       echo 'var dump de $_SESSION:';
       var_dump($_SESSION);
     }


     if (isset($_POST['oCom'])){ //si objet commentaire en parametre
        $deleted = insertOrModifCom($_POST);// booleen pour savoir si le message a été suprimé ou valider
     }
     //dertermine action
    $action ='accueil';
    if (isset($_GET['action'])){
        $action = $_GET['action'];

    }
    if (isset($_POST['action'])){
        $action = $_POST['action'];

    }


    $tOBds = BdManager::getAllOBd(); //tableau d'objet bd
     $tComsUnpublished = CommentairesManager::getAllOComUnpublished(); //tableau de comms non publié
//     var_dump($tComsUnpublished);


    if (isset($_GET['search'])and($_GET['search'])!=""){ //appel de la fonction recherche
        $tOBds = recherche($_GET['search'],$tOBds);
    }

     if (isset($_POST)){ //appel de la fonction conexion
         if (isset($_POST['conexion'])){
             if (($_POST['conexion']== 'conexion')){
                  $badpassword = conexion($_POST,$login,$password);
             }
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

        case 'pageAdmin':
            $titreSite = 'BDTeK/admin';
            $titrePage = 'Administration';
            include 'vues/view_header.php';
            include 'vues/view_admin.php';
            include 'vues/view_footer.php';
            break;
    }
