<?php
$msg ="";
        
//var_dump($_GET);
$serializeObd = $_GET['oBd'];
//var_dump($serializeObd);

$oBd = deserialise($serializeObd);

//get des commentaires
$tComs = CommentairesManager::getAllOComFromABd($oBd->getBd_Id()); //tout les coms
$tcomsV = ComsValid($tComs); //array de tout les coms validé

//var_dump($tComs);

$tThemes = $oBd->getBdThemes();
//var_dump($tThemes);
?>

                <section id ="main" class="col-xs-12 col-sm-9">
                    <h2><?php echo $oBd->getBdTitre(); ?></h2>
                    <div>
                        
                        <div class="row">
                            <div class="col-md-5  order-md-2" id="bdSide">
                                <img src="<?php echo $cheminImages.$oBd->getBdImg(); ?>" alt="<?php echo $oBd->getBdTitre(); ?>" id="imgConsultation">
                                <div>
                                    <h3>Auteur</h3>
                                    <a href="index.php?search=<?php echo $oBd->getAuteur(); ?>"><p><?php echo $oBd->getAuteur(); ?></p></a>
                                </div>
                                <div id="resume" class="col-xs-12">
                                    <h3>Resumé</h3>
                                    <p><?php echo $oBd->getBdResume(); ?></p>
                                </div>
                                <div>
                                    <h3>Thème associés :</h3>
                                    <?php
                                    if (!(isset($tThemes[0]))){
                                    
                                    $msg = 'Pas de thème associé à cette BD.';
                                    
                                    }else{
                                        foreach ($tThemes as $theme) {
                                           $msg .= '<a href="index.php?search='. $theme.'">'.$theme.'</a>'.', ';
                                        }
                                        $msg =  ucfirst (substr($msg, 0, -2).'.');
                                    }
                                    ?>
                                    <p><?php echo $msg; ?></p>
                                </div>
                            </div> 
                            
                            <div id="comm" class="col-md-7  order-md-1">
                                
                                <h3>Commentaires</h3>
                                <div id="allCom">
                                <?php
                                if (count($tcomsV)==0){
                                    ?>
                                    <p>Pas encore de commentaire. Soyez le 1er à en poster un !</p>
                                    <?php                                    
                                }else{
                                    for($i=0; $i< count($tcomsV);$i++) {
                                        $com = $tcomsV[$i];
                                    ?>
                                    <div class="commentaire row">
                                        <div class="media comment-box">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_1x.png">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading"><h4 ><?php echo $com->getCom_auteur(); ?></h4><h5>Posté le : <?php echo $com->getCom_date(); ?></h5></div>
                                                <p><?php echo $com->getCom_texte(); ?></p>

                                            </div>
                                        </div>
                                        <hr/>
                                    </div>

                                    <?php
                                    }
                                }
                                ?>
                                </div>
                            
                                <div id="postComm" class="row-form" >
                                    <form name="postCom" action="vues/pageInsertOk.php">
                                    
                                        <h3>Postez votre commentaire</h3>
                                        <?php
                                          if (isset($_GET['insert'])){
                                            $insert = $_GET['insert'];
                                            if($insert == 1){
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
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="pesudo" class="label">Votre pseudo</label>
                                            </div>
                                            <input type="text" class="form-control col-8 formPost" name="pseudo" value="" required/>
                                            
                                            <textarea class="form-control formPost col-10" rows="5" id="comment" name="texte" placeholder="Votre commentaire" required></textarea><br/>
                                            <div class="col-3">
                                                <input type="hidden" name="oBd" value="<?php echo $serializeObd; ?>" />
                                                <input type="hidden" name="action" value="insertCom" />
                                                
                                                <input type="submit" class=" btn btn-primary"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </section>
