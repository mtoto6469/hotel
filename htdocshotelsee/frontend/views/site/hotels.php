<?php
use yii\widgets\ActiveForm;

$url=Yii::$app->urlManager;
?>
<div  class="body">


    <?php
    if ($tabliq != null) {
        $i=0;
        ?>
        <div class='row'>

            <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel2">


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
                <a data-slide="prev" href="#quote-carousel2" class="left carousel-control lefta" style="background: none!important;">
                    <i class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#quote-carousel2" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                    <i class="fa fa-chevron-right"></i></a>
            </div>

        </div>

        <?php
    }
    ?>




    <div class="search">
        <h1 style="font-size: 18px;font-weight: bold;color: #1E2E61">لیست هتل های  کیش</h1>
        <?php $form = ActiveForm::begin(['action' => ['site/search']]); ?>
            <button class="btn btn-default" >جستجو</button>

            <input type="text" placeholder="نام هتل را وارد کنید" name="name">

        <?php ActiveForm::end(); ?>

    </div>

    <div class="hotel-box" >

        <?php
        if(isset($_SESSION['errorHotel'])){
            if($_SESSION['errorHotel']!=null){
                echo '<div class="alert alert-danger" style="text-align: right" >'.$_SESSION['errorHotel'].'</div>';
            }$_SESSION['errorHotel']=null;
        }
        ?>

        <?php
        if(isset($_SESSION['result2'])){
            if($_SESSION['result2']!=null){
                echo '<div class="alert alert-danger" style="text-align: right" >'.$_SESSION['result2'].'</div>';
            }$_SESSION['result2']=null;
        }
        ?>

        <?php
        if($hotels!=null){
            foreach ($hotels as $h){
                ?>
                <a href="<?=$url->createAbsoluteUrl(['site/hotel','id'=>$h->id])?>">
                    <div class="wid">
                    <div class="img-box">
                        <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$h->logo_hotel?>" alt="<?=$h->name_hotel?>">
              
                        <h4><?=$h->name_hotel?> </h4>
                        <span><?=$h->name_hotel_en?></span>
                    </div>
                </div></a>
           
        <?php
            }
        }else{
            echo '<div class="alert alert-warning" style="margin: 10%;text-align: center">اطلاعاتی یافت شد</div>';
        }
        ?>


    </div>




</div>
