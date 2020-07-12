<?php
$url=Yii::$app->urlManager;
?>
<?php
if ($tabliq != null) {
    $i=0;
    ?>
    <div class='row'>

        <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel7">


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
            <a data-slide="prev" href="#quote-carousel7" class="left carousel-control lefta" style="background: none!important;">
                <i class="fa fa-chevron-left"></i></a>
            <a data-slide="next" href="#quote-carousel7" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                <i class="fa fa-chevron-right"></i></a>
        </div>

    </div>

    <?php
}
?>

<?php
if($khadamat!=null){
    foreach ($khadamat as $kh){
        ?>

        <div class="khadamat" dir="rtl">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$kh->img?>" alt="<?=$kh->name?>">

            <h3><?=$kh->name?></h3>
            <span><i class="fa fa-map-marker"></i><?=$kh->location?></span>
            <a class="btn btn-default btnK" href="<?=$url->createAbsoluteUrl(['site/onekhadamat','id'=>$kh->id])?>">جزئیات</a>

        </div>
<?php
    }

}else{
    echo '<div class="alert alert-warning">در حال حاضر اطلاعاتی در دست نیست</div>';
}
?>
