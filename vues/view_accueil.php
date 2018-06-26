<?php

/* 
 * 
 */
?>
                <!-- main area -->

                <section id="main" class="col-xs-12 col-sm-9">
                    
                        <div id="search">
                            <div class="col-lg-6">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Rechercher ...">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                  </span>
                                </div><!-- /input-group -->
                              </div><!-- /.col-lg-6 -->
                        </div>
                        <div id="slider" class="row">
                            <div class="col-xs-12">
                                
                                <!-- Carousel -->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <!-- Carousel Indicators -->
                                    <ol class="carousel-indicators">
                                <?php
                                $nbLivre = (count($img_directory))/6;
                                for ($i = 0;$i < $nbLivre; $i++){
                                ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>"<?php  if ($i==0) echo ' class="active"';?>></li>
                                <?php
                                }
                                ?>
    </ol>
                                
                                <!-- The slideshow -->
                                <div class="carousel-inner" role="listbox">
                                  
                <?php
                $nbImg = 0;
//                var_dump($img_directory);
                
                for ($y = 2;$y < count($img_directory)+2; $y++){ //a changer peu dynamique
//                    print_r($y);
                    if ((($y)-2)%6 == 0){                  
                    ?>
                    <?php if ($y != 2){ ?></div> <?php } ?>                                    
                                    <div class="carousel-item <?php  if($nbImg == 0) echo ' active'; ?>">
                    <?php
                    }
                    $nbImg ++;
                    
                    ?>
                                        <a class="imgCar col-sm-3 img-thumbnail" href=""><img src=<?php  echo 'images/'.$img_directory[$y].' alt="img"'; ?> class="" /></a>
                <?php
                    
                     if ((($y)-2)%6 == 0){
                    ?>
          
                <?php
                     }
                }
                ?> 
                                  </div>
                                

                                <!-- Carousel Controls -->
                                <a id="ctrlPrev" class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                  <span class="btnCar"><</span>
                                </a>
                                <a id="ctrlNext" class="carousel-control-next" href="#myCarousel" data-slide="next">
                                  <span class="btnCar">></span>
                                </a>
                            </div>
                            
                            
                        </div>                        
                    </div> 
                </section>
            </div><!--/.row-->
          </div><!--/.container-->
        </div><!--/.page-container-->
