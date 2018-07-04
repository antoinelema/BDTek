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
 * deconexion de la session admin
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

/**
 * cherche les commentaires valide dans un tableau de commentaires
 * @param array $tComs de tout les coms
 * @return array de coms validé
 */
function ComsValid($tComs){
    $tComsV = array();
    foreach ($tComs as $oCom){
        if ($oCom->getPublie()=='v'){
            $tComsV[]=$oCom;
        }
    }
    return $tComsV;
}

/**
 * update un commentaire ou le delete en fonction de la variable reçu
 * return un boolean pour savoir si commentaire a été delete ou update
 */
function insertOrModifCom($postOCom){
//    var_dump($postOCom);
    $deleted = FALSE;
    $serializeOCom = $postOCom['oCom'];
    $oCom = deserialise($serializeOCom);
    if(isset($postOCom['insert'])){
         if ($postOCom['insert']=='valider'){
             $oCom->setCom_texte($postOCom['texte']);
             CommentairesManager::updateCom($oCom);
         }else{
             CommentairesManager::deleteCom($oCom);
             $deleted = TRUE;
         }
     }
     return $deleted;
}