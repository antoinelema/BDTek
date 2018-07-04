<?php

/* head et navbar
 * 
 */

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!--mon css-->
    <link rel="stylesheet" type="text/css" href="./css/main.css"/>
    
    
    <title><?php echo $titreSite; ?></title>
  </head>
  <body>
    <div class="page-container">
  
        <!-- top navbar -->
        <nav class="navbar navbar-light ">
            <a href="index.php" >
                <img src="src/img/livre.png" alt="accueil" data-toggle="tooltip" title="Retour à l'accueil"/>
            </a>
            <h1 class="mx-auto">La BDTek</h1>
        </nav>
        
        <div class="container-fluid">
          <div class="row row-offcanvas row-offcanvas-left">
                    
            <?php
            include 'vues/sidebar.php'; ?>