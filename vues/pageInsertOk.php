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

header('Refresh: 2; ../index.php?action=afficheBD&oBd='.urlencode($serializeObd));

try {
    $insert = TRUE;
    CommentairesManager::insertCom($oComToInsert);
} catch (Exception $ex) {
    echo $ex;
    $insert = FALSE;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Message</title>
  </head>
  <body>
    <?php
      if (isset($insert)){

        if($insert == TRUE){
        ?>
        <div>
            <p> Votre Commentaire a été pris en compte. Il maintenant est en attente de moderation. (Délais de 3 à 10 jours ouvrés.)</p>
        </div>
        <?php
        } else {
        ?>
        <div>
            <p>Une erreur est survenue, votre Commentaire n'a pas été pris en compte.</p>
        </div>
        <?php 
        }
    }
    ?>
  </body>
</html>
