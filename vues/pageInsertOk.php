<?php
/**
 * page pour verifier et envoyé l'insert
 * renvoi sur la page de la bd avec l'objet Bd dans l'url
 */

require '../modele/model.inc.php';
require '../param/param.php';
require '../DAO/ConnectionManager.dao.php';
require '../DAO/BdManager.dao.php';
require '../DAO/CommentairesManager.dao.php';
require '../objet/BD.class.php';
require '../objet/Commentaire.class.php';

$insert;
$compseudo = $_GET['pseudo'];
$comTexte = $_GET['texte'];
$serializeObd = $_GET['oBd'];
$obd = deserialise($serializeObd);
$oComToInsert = new Commentaire($obd->getBd_Id(), $compseudo, $comTexte);



try {
    $insert = 1;
    CommentairesManager::insertCom($oComToInsert);
} catch (Exception $ex) {
    echo $ex;
    $insert = 0;
}

header('Location: ../index.php?action=afficheBD&insert='.$insert.'&oBd='.urlencode($serializeObd));

