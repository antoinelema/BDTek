<?php

/* 
 * vue en conexion admin pour gerer les commentaires
 */
?>
<section id="main" class="col-xs-12 col-sm-9">
    <h2><?php echo $titrePage; ?></h2>
    <h3>Moderation</h3>
    <div class="row">
        <?php
        if (isset($deleted)){

            if ($deleted == TRUE){
                ?>
            <ul class="col-3 list-group ">
                <li class="supprOrValid list-group-item list-group-item-danger">Le commentaire a bien été supprimé</li>
            </ul>
                <?php

            }else{
                ?>
            <ul class="col-3 list-group ">
                <li class="supprOrValid list-group-item list-group-item-success">Le commentaire a bien été ajouté</li>
            </ul>
                <?php
                }
        }
        if (count($tComsUnpublished)==0){
        ?>
        <p class="col-12">Pas de message pour le moment.</p>
        <?php
        }else{
        foreach($tComsUnpublished as $oCom){
            $bd = BdManager::getOneOBd($oCom->getCom_bd_id());
            $titreBD = $bd->getBdTitre();
    //        var_dump($oCom);
    ?>
        <form action="<?php $_PHP_SELF ?>" method="POST"class="col-3">
          <ul class="list-group">
            <li class="list-group-item list-group-item-info"><?php echo $titreBD.' : '.$oCom->getCom_auteur().' le '.$oCom->getCom_date() ?></li>
            <li class="list-group-item "><textarea class="form-control" name="texte" id="txtAreaAdmin" rows="3" required><?php echo $oCom->getCom_texte() ?></textarea></li>
            <li class="list-group-item ">
                <div >
                    <?php
                    $comSerial = serialize($oCom);
                    $comSerialEncode = urlencode($comSerial);
                    ?>
                    <input type="hidden" name="oCom" value="<?php echo $comSerialEncode; ?>" />
                    <input type="hidden" name="action" value="pageAdmin" />
                    <input type="submit" name="insert" value="valider" class="col-5 btn btn-primary form-control "/>
                    <input type="submit" name="insert" value="refuser" class="col-5 btn btn-primary form-control "/>
                </div>
            </li>
          </ul>
        </form>
    
    <?php } 
    
    }?>
    </div>
</section>