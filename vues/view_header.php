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
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Navbar</span>
        </nav>

        <div class="container">
          <div class="row row-offcanvas row-offcanvas-left">
                    
            <?php if ($action != 'admin')
            include 'vues/sidebar.php'; ?>