<?php

/* head et navbar
 * 
 */

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/main.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <title><?php echo $titreSite; ?></title>
  </head>
  <body>
    <div class="page-container">
  
        <!-- top navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
           <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">

               </button>
                <h1><?php echo $titrePage; ?></h1>
            </div>
           </div>
        </div>

        <div class="container">
          <div class="row row-offcanvas row-offcanvas-left">
                    
            <?php if ($action != 'admin')
            include 'vues/sidebar.php'; ?>