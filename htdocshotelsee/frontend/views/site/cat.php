<?php
$url=Yii::$app->urlManager;
?>

<div >



    <?php
    if(isset($_GET['id'])&& $_GET['id']!=null){
    if($_GET['id']!=6){
    if ($tabliq != null) {
        $i=0;
        ?>
        <div class='row'>

            <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel4">


                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner">

                    <!-- Quote 1 -->

                    <?php
                    foreach ($tabliq as $t) {
                        if($i==0){?>
                            <div class="item active">

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
                <a data-slide="prev" href="#quote-carousel4" class="left carousel-control lefta" style="background: none!important;">
                    <i class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#quote-carousel4" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                    <i class="fa fa-chevron-right"></i></a>
            </div>

        </div>

        <?php
    }
    }
    }
    ?>


    <?php
        if($cat!=null){
            ?>


    <div class="cat-box">
        <?php
            foreach ($cat as $c){
                ?>
                <a href="<?=$url->createAbsoluteUrl(['site/post','id'=>$c->id])?>">
                    <div class="cat">


                        <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$c->logo?>" alt="<?=$c->title?>">
                        <span><?=$c->title?></span>
                    </div>

                </a>

        <?php
            }?>




    </div>

        <?php
        }

        ?>


</div>


    <?php
    if($post!=null){
        ?>

            <div class="white" >
                <?php
                foreach ($post as $p){
                    ?>
                    <div class="f" >
                        <h3><?=$p->title?></h3>
                        <p><?=$p->text?></p>
                    </div>

                    <?php
                }
                ?>
            </div>


    <?php
    }
    ?>

<div style="padding: 4%;text-align: center">
    <?php


    if(isset($_GET['id'])&& $_GET['id']!=null){
        if($_GET['id']==6){

            ?>
            <img src="<?=Yii::$app->request->hostInfo?>/upload/dis.png" width="100%" height="200px">
            <h4  style="text-align: center;font-weight: bold;color:#1E2E61"> !!! در دست ساخت است </h4>
    <?php
        }
    }
    ?>

</div>

