<?php

/* 
 * affiche l'authentification sur le coté gauche.
 */
?>
    <!-- sidebar -->
               
                <div class="col-2 " id="sidebar" role="navigation">
                    <?php 
//                    var_dump($_SESSION);
                    if (isset($_SESSION) && (isset($_SESSION['adminCo']))){
                    ?>
                    <h3>Bonjour</h3>
                    <form action="<?php $_PHP_SELF ?>" method="POST" id="goToAdmin">
                        <div class="form-row">
                            <div class="col-11">
                                <input type="hidden" name="action" value="pageAdmin" />
                                <a href="javascript:{}" onclick="document.getElementById('goToAdmin').submit();">Page admin</a>
                            </div>
                        </div>    
                    </form>
                    <form action="vues/pagedeco" method="POST">
                        <div class="form-row">
                            <div class="col-11">
                                <input type="hidden" name="conexion" value="deco" />
                                <input type="hidden" name="action" value="accueil" />
                                <input type="submit" class="btn btn-primary form-control" value="Deconexion" />
                            </div>
                        </div>
                            
                    </form>
                    <?php 
                    }else{
                    ?>
                    <form action="<?php $_PHP_SELF ?>" method="post">
                        <h3>Authentification</h3>
                        <div class="form-row">
                            <div class="col-11">
                                <input type="text" class="form-control" placeholder="Identifiant" name="userLogin" required/>
                                <input type="password" class="form-control" placeholder="password" name="userPassword" required/><br/>
                                <?php 
                                if (isset($badpassword)){
                                    if ($badpassword){
                                ?>
                                <p id="badPassword">Le login ou le mot de passe entré est érroné</p>
                                <?php
                                    }
                                }
                                ?>
                                <input type="hidden" name="conexion" value="conexion" />
                                <input type="submit" class="btn btn-primary form-control" value="Valider" />
                            </div>    
                        </div>    
                    </form>
                    <?php
                    }
                    ?>
                </div>
