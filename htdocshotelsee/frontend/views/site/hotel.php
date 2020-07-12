<?php
$url = Yii::$app->urlManager;
use frontend\models\AuthAssignment;
use frontend\models\Tblmessage;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div style="min-height: 100px;padding-bottom: 10px ">
    <?php
    if ($tabliq != null) {
        $i=0;
        ?>
        <div class='row'>

            <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel3">


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
                                        <video controls style="width: 100%;height: 150px" >
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
                <a data-slide="prev" href="#quote-carousel3" class="left carousel-control lefta" style="background: none!important;">
                    <i class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#quote-carousel3" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                    <i class="fa fa-chevron-right"></i></a>
            </div>

        </div>

        <?php
    }
    ?>










    <?php
    if ($hotel != null) {
        ?>

        
        <div class="header-hotel">

            <h1> <?= $hotel->name_hotel ?></h1><span> <?= $hotel->name_hotel_en ?></span>
            <div class="i">
                <?php
                if ($hotel->status_star == "apartment") {
                    ?>
                    <span>هتل آپارتمان</span>
                    <?php
                }
                if ($hotel->status_star == "1star") {
                    ?>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star i"></i>
                    <i class="fa fa-star i"></i>
                    <i class="fa fa-star i"></i>
                    <i class="fa fa-star i"></i>
                    <?php

                }
                if ($hotel->status_star == "2star") {
                    ?>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star i"></i>
                    <i class="fa fa-star i"></i>
                    <i class="fa fa-star i"></i>
                    <?php

                }
                if ($hotel->status_star == "3star") {
                    ?>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star i"></i>
                    <i class="fa fa-star i"></i>
                    <?php

                }
                if ($hotel->status_star == "4star") {
                    ?>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star i"></i>
                    <?php

                }
                if ($hotel->status_star == "5star") {
                    ?>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <i class="fa fa-star c"></i>
                    <?php
                }
                ?>

            </div>
            <?php
            $item_role=AuthAssignment::findOne(['user_id'=>Yii::$app->user->getId()]);
            if($item_role!=null && $item_role->item_name=='admin'){
                ?>
                <a class="btn btn-blue" href="<?=$url->createAbsoluteUrl(['site/report','id_hotel'=>$hotel->id])?>">پنل مدیریت</a>
            <?php
            }
            ?>

            


        </div>

        <!--    امکانات-->

        <div class="notification ">
            <span>امکانات</span>
            <div class="flag">
                <img src="<?= Yii::$app->request->hostInfo ?>/upload/flag-ir.jpg" onclick="irM()" alt="ir">
           


            </div>
        </div>
        <?php
        if($khadamat!=null){
            ?>

            <div class="notification-text" id="irM">
                <div class="d" style="display: inline-block">

                    <?php
                    foreach ($khadamat as $kh){
                        ?>
                       <a href="<?=$url->createAbsoluteUrl(['site/khadamat','id'=>$kh->id])?>"> 
                           <div class="log1">
                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$kh->logo?>" alt="<?=$kh->title?>">
                               <br><br>
                            <span><?=$kh->title?></span>
                        </div>
                       </a>
                        <?php
                    }
                    ?>


                </div>



            </div>
            
            
            <div class="notification-text" id="enM" style="display: none;">
                <div class="d" style="display: inline-block">

                    <?php
                    foreach ($khadamat as $kh){
                        ?>
                        <a href="<?=$url->createAbsoluteUrl(['site/khadamat','id'=>$kh->id])?>"><div class="log12">
                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$kh->logo?>"><br><br>
                            <span><?=$kh->title_en?></span>
                        </div></a>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <!--    امکانات-->

            <?php
        }
        ?>


        <!--نقشه هتل-->


        <div class="notification-text">

            <div class="d" style="display: inline-block">
                <a href="<?= $url->createAbsoluteUrl(['site/gallery', 'hotel' => $hotel->id]) ?>">
                    <div class="log1">
                        <i class="fa fa-image"></i><br><br>
                        <span>گالری</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/hotelpost', 'hotel' => $hotel->id,'title'=>'آدرس']) ?>">
                    <div class="log1">
                        <i class="fa fa-phone"></i><br><br>
                        <span> آدرس و شماره تماس</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/hotelpost', 'hotel' => $hotel->id,'title'=>'توضیحات']) ?>">
                    <div class="log1">
                        <i class="fa fa-file"></i><br><br>
                        <span>راهنما</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/hotelpost', 'hotel' => $hotel->id,'title'=>'قوانین']) ?>">
                    <div class="log1">
                        <i class="fa fa-file-text"></i><br><br>
                        <span>قوانین</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/hotelpost', 'hotel' => $hotel->id,'title'=>'فاصله']) ?>">
                    <div class="log1">
                        <i class="fa fa-map-marker"></i><br><br>
                        <span>فاصله تا مراکز شهر</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/hotelpost', 'hotel' => $hotel->id,'title'=>'نقشه']) ?>">
                    <div class="log1">
                        <i class="fa fa-globe"></i><br><br>
                        <span>نقشه</span>
                    </div>
                </a>
            </div>

        </div>


        <div class="message pad">

            <?php
            if (isset($_SESSION['suc-me'])) {
                if ($_SESSION['suc-me'] != null) {
                    echo '<h6 class="alert alert-warning war" style="text-align: center">' . $_SESSION['suc-me'] . '</h6>';
                }
                $_SESSION['suc-me'] = null;
            }
            ?>
            <h4 >انتقادات و پیشنهادات</h4>
            <?php
            $model = new Tblmessage(); ?>
            <?php $form = ActiveForm::begin(['action' => ['/message/create']]); ?>

            <?= $form->field($model, 'id_hotel')->hiddenInput(['value' => $id])->label(' ') ?>
            <?= $form->field($model, 'text')->textarea(['rows' => 6])->label(' ') ?>


            <div class="form-group">
                <?= Html::submitButton('ثبت انتقادات و پیشنهادات', ['class' => 'btn btn-default btn-green']) ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>


        <?php
    }
    ?>


    <script>
        function irM() {
            $('#enM').css("display", "none");
            $('#irM').css("display", "block");

        }

        function enM() {
            $('#irM').css("display", "none");
            $('#enM').css("display", "block");
        }


        //قوانین
        function irQ() {
            $('#enQ').css("display", "none");
            $('#irQ').css("display", "block");

        }

        function enQ() {
            $('#irQ').css("display", "none");
            $('#enQ').css("display", "block");
        }
        //قوانین

        //فاصله
        function irF() {
            $('#enF').css("display", "none");
            $('#irF').css("display", "block");

        }

        function enF() {
            $('#irF').css("display", "none");
            $('#enF').css("display", "block");
        }
        //فاصله


        //نقشه
        function irN() {
            $('#enN').css("display", "none");
            $('#irN').css("display", "block");

        }

        function enN() {
            $('#irN').css("display", "none");
            $('#enN').css("display", "block");
        }
        //نقشه

        //address
        function irA() {
            $('#enA').css("display", "none");
            $('#irA').css("display", "block");

        }

        function enA() {
            $('#irA').css("display", "none");
            $('#enA').css("display", "block");
        }
        //address

        //    توضیحات
        function irT() {
            $('#enT').css("display", "none");
            $('#irT').css("display", "block");

        }

        function enT() {
            $('#irT').css("display", "none");
            $('#enT').css("display", "block");
        }
        //    توضیحات
    </script>