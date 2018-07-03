<?php

/* 
 * affiche l'authentification sur le coté gauche.
 */
?>
    <!-- sidebar -->
               
                <div class="col-2 " id="sidebar" role="navigation">
                    <?php 
                    if (isset($_SESSION)){
                    ?>
                    <h3>Bonjour</h3>
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
                                if ($badpassword){
                                ?>
                                <p id="badPassword">Le login ou le mot de passe entré est érroné</p>
                                <?php
                                }
                                ?>
                                <input type="submit" class="btn btn-primary form-control" value="Valider" />
                            </div>    
                        </div>    
                    </form>
                    <?php
                    }
                    ?>
                </div>
