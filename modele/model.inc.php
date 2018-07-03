<?php
/* 
 * 
 */


/**
 * deserialize un objet
 * @param string $serialisedO 
 * @return objet $o
 */
function deserialise($serialisedO){

    $encodedO = stripslashes(urldecode($serialisedO));
    //var_dump($encodeObd);

    $o = unserialize($encodedO);
    
    return $o;
}

/**
 * conexion a la session admin
 * @param array $post
 * @param string $login
 * @param string $password
 * @return boolean
 */
function conexion($post,$login,$password){
    
    if (isset($post['userLogin'])){
        
        $userLogin = $post['userLogin'];
        $userPassword = $post['userPassword'];
        
        if(($userLogin == $login)&&($userPassword == $password)){
            if (!(isset($_SESSION))){
                session_start();
            }
            
            $_SESSION['adminCo'] = TRUE; //variable pour verifier si l'admin est conecté
            return FALSE;
        }else{
            return TRUE; //si le mdp est mauvais retourne TRUE
            
        }
    }
}

/**
 * deconexion de la session en cour
 */
function deconexion(){
        session_unset();
        session_destroy();
}

/**
 * enleve les parametres de l'url
 * @return string url sans $_GET
 */
function urlSansGet(){
  $urlCourante=$_SERVER["REQUEST_URI"];
  $urlGet = explode("?",$urlCourante);
  return  $urlGet[0];
}