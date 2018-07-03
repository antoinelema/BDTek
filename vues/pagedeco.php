<?php

/* 
 * Page appeler pour la deconexion pour remetre $_Post et $_GET a null
 * renvoi sur la page d'accueil
 */

session_start();

require '../modele/model.inc.php';

deconexion();

header('Location: ../index.php');