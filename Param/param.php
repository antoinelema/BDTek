<?php

/* 
 *transformation des parametres en variables
 */

//general
$tParams = parse_ini_file('param.ini');
$DEBUG = $tParams['debug'];
$cheminImages = $tParams['cheminImages'];

//conexion bdd
$PARAM_hote = $tParams['hote'];
$PARAM_port = $tParams['port'];
$PARAM_nomBDD = $tParams['nom_bdd'];
$PARAM_user = $tParams['utilisateur'];
$PARAM_mdp = $tParams['mot_passe'];

//conexion admin
$login = $tParams['login'];
$password = $tParams['password'];