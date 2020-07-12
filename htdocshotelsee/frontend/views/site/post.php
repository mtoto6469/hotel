<?php
?>
<div class="" style="height: 100%">
    <?php
    if ($tabliq != null) {
        $i=0;
        ?>
        <div class='row'>

            <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel9">


                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner">

                    <!-- Quote 1 -->

                    <?php
                    foreach ($tabliq as $t) {
                        if($i==0){?>
                            <div class="item active" dir="rtl">

                                <div class="text-center sliders ">
                                    <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $t->img ?>" alt="<?=$t->title?>">

                                    <small><?= $t->title ?></small>
                                </div>
                            </div>
                            <?php
                        }else{
                            $ex=explode('.',$t->img);
                            ?>
                            <div class="item">

                                <div class=" text-center sliders">
                                    <?php
                                    if($ex[1]=="mp4"){?>
                                        <video controls style="width: 100%;height: 150px">
                                            <source src="<?=Yii::$app->request->hostInfo?>/upload/<?=$t->img?>" type="video/mp4">
                                        </video>
                                        <?php
                                    }else{?>
                                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $t->img ?>" alt="<?=$t->title?>">
                                        <?php
                                    }
                                    ?>


                                    <small><?= $t->title ?></small>
                                </div>

                            </div>

                        <?php }
                        $i++;
                    }
                    ?>

                </div>

                <!-- Carousel Buttons Next/Prev -->
                <a data-slide="prev" href="#quote-carousel9" class="left carousel-control lefta" style="background: none!important;">
                    <i class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#quote-carousel9" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                    <i class="fa fa-chevron-right"></i></a>
            </div>

        </div>

        <?php
    }
    ?>


    <div class="white" >

        <?php
        if($post!=null){
            foreach ($post as $p){
                ?>
                <div class="f" dir="rtl">
                    <h3><?=$p->title?></h3>
                    <p><?=$p->text?></p>
                </div>

                <?php
            }
        }
        ?>

    </div>
<!--    <div class="white" style="background: white;height: 200px"></div>-->
  
</div>
