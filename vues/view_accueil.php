<?php

/* vue du slider et recherche
 *
 */
?>
                <!-- main area -->
                    <section id="main" class="col-xs-12 col-sm-9">
                        <form action="<?php $_PHP_SELF ?>" method="GET" id="search">
                            <div class="col-lg-6">
                                <div class="input-group">
                                  <input type="text" class="form-control" name ="search" placeholder="Rechercher ...">
                                  <span class="input-group-btn">
                                      <button class="btn btn-default" type="submit">Go!</button>
                                  </span>
                                </div><!-- /input-group -->
                              </div><!-- /.col-lg-6 -->
                        </form>
                        <div id="slider" class="row">
                            <div class="col-12">
                                <!-- Carousel -->
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <?php if (count($tOBds)>6){ ?>
                                    <!-- Carousel Indicators -->
                                        <ol class="carousel-indicators">
                                    <?php
                                    $nbLivre = (count($tOBds))/6;
                                    for ($i = 0;$i < $nbLivre; $i++){
                                    ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>"<?php  if ($i==0) echo ' class="active"';?>></li>
                                    <?php
                                    }
                                    ?>
        </ol>
                                    <?php } ?>
                                    <!-- slider -->
                                    <div class="carousel-inner" role="listbox">
                        <?php
                        $nbImg = 0;
        //                var_dump($img_directory);
                        for ($y = 0;$y < count($tOBds); $y++){
        //                    print_r($y);

                            if ((($y))%6 == 0){
                            ?>
                <?php if ($y != 0){ ?></div> <!-- fin carousel-item --> <?php } ?>

                                            <div class="carousel-item <?php  if($nbImg == 0) echo ' active'; ?>">
                            <?php
                            }
                            $nbImg ++;

                            ?>
                        <form action="<?php $_PHP_SELF ?>" method="GET" id="<?php echo 'form'.$tOBds[$y]->getbd_Id(); ?>" class="formImg">
                                                    <div class="imgCar col-sm-3 ">
                                                        <a class="bd" href="javascript:{}" onclick="document.getElementById('<?php echo 'form'.$tOBds[$y]->getBd_Id(); ?>').submit();">
                                                            <img src=<?php  echo '"'.$cheminImages.$tOBds[$y]->getBdImg().'" id="'.$tOBds[$y]->getBdImg().'" alt="'.$tOBds[$y]->getBdTitre().'"'; ?> class="bdImg" />
                                                            <div class="overlay"><?php echo $tOBds[$y]->getBdTitre(); ?></div>
                                                        </a>
                                                    </div>
                                                    <input type="hidden" name="action" value="afficheBD"/>
                                                    <?php
                                                    $bdSerial = serialize($tOBds[$y]);
                                                    $bdSerialEncode = urlencode($bdSerial);
//                                                    var_dump($tOBds[$y]->getbd_Id);
                                                    ?>
<input type="hidden" name="oBd" value="<?php echo $bdSerialEncode; ?>" />
                                                </form>
                        <?php
                        }
                        ?>
                    </div> <!-- fin carousel-item -->
                                    </div> <!-- fin carousel-inner -->
                                <?php
                                if (count($tOBds)>6){ //s'il y a moins de 6 bd on n'affiche pas les fleches
                                ?>
                                <!-- Controls du Carousel -->
                                <a id="ctrlPrev" class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                  <span class="btnCar">&lt</span>
                                </a>
                                <a id="ctrlNext" class="carousel-control-next" href="#myCarousel" data-slide="next">
                                    <span class="btnCar">></span>
                                </a>
                                <?php
                                }
                                ?>
</div>
                        </div>
                    </div>
                </section>
