<?php
?>

<?php
if ($tabliq != null) {
    $i=0;
    ?>
    <div class='row'>

        <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel6">


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
                                    <video controls >
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
            <a data-slide="prev" href="#quote-carousel6" class="left carousel-control lefta" style="background: none!important;">
                <i class="fa fa-chevron-left"></i></a>
            <a data-slide="next" href="#quote-carousel6" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                <i class="fa fa-chevron-right"></i></a>
        </div>

    </div>

    <?php
}
?>
<div  >


    <div class="gallery-img" >

        <?php
        if($gallery!=null){
            foreach ($gallery as $g){
                $ex=explode('.',$g->img);
                ?>

                <div class="col-md-3 col-xs-6">
                    <div class="imgs">

                        <?php
                        if($ex[1]=="mp4"){?>
                            <video controls style="width:100%; height:250px;">
                                <source src="<?=Yii::$app->request->hostInfo?>/upload/<?=$g->img?>" type="video/mp4">
                            </video>
                            <?php
                        }else{?>
                            <div class="overlay"></div>
                            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$g->img?>" alt="<?=$g->alt?>">
                            <?php
                        }
                        ?>

                        <h4><?=$g->alt?></h4>
                    </div>

                </div>
                
        <?php
            }
        }else{

            echo '<div class="white" style="color: #9F1235">تصویری وجود ندارد</div>';
        }
        ?>





    </div>
</div>
