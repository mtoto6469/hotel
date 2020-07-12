<?php

/* @var $this yii\web\View */

use frontend\models\Tblmessage;

use yii\helpers\Html;

$this->title = 'اپ';
$url = Yii::$app->urlManager;
?>

<div class="all-pages body2 ">


    <div class="row">
        <div class="row3">
            <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 1]) ?>">

                <div class="right shadow" style="background: #FFAA55">
                    <i class="fa fa-usd"></i>
                    <span>تخفیفات یا برترین ها</span>
                </div>
            </a>
            <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 6]) ?>">
                <div class="right shadow" style="background: #FF55AA">
                    <i class="fa fa-ticket"></i>
                    <span>رزرو هتل</span>
                </div>
            </a>

        </div>
    </div>
    <div class="row">
        <div class="row2">
            <div class="left">
                <a href="https://www.todaytime.ir/%D9%82%D8%A8%D9%84%D9%87-%D9%86%D9%85%D8%A7">

                    <div class="left1 shadow" style="background: #AA7FFF">
                        <i class="fa fa-compass"></i>
                        <span>قبله نما</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 5]) ?>">
                    <div class="left2 shadow" style="background: #2AFFD4 ">
                        <i class="fa fa-shopping-cart"></i>
                        <span>مراکز خرید</span>
                    </div>
                </a>
            </div>

            <a href="<?= $url->createAbsoluteUrl(['site/hotels']) ?>">
                <div class="center shadow" style="background: #159DFF">
                    <img src="<?= Yii::$app->request->hostInfo ?>/upload/hoteles.png">
                    <span>لیست هتل ها</span>
                </div>
            </a>
            <div class="right">
                <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 8]) ?>">
                    <div class="right1 shadow" style="background: #AAFFAA">
                        <i class="fa fa-exclamation-circle"></i>
                        <span>درباره کیش</span>
                    </div>
                </a>
                <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 3]) ?>">
                    <div class="right2 shadow" style="background:#557FFF">
                        <i class="fa fa-phone"></i>
                        <span>تلفن های ضروری</span>
                    </div>
                </a>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="row3">

            <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 4]) ?>">
                <div class="right shadow" style="background: #FF2A2A">
                    <i class="fa fa-plane"></i>
                    <span>بیلت های هواپیما</span>
                </div>
            </a>
            <a href="<?= $url->createAbsoluteUrl(['site/cat', 'id' => 7]) ?>">
                <div class="right shadow" style="background: #D4FF55">
                    <i class="fa fa-image"></i>
                    <span>مراکز گردشگری</span>
                </div>
            </a>
        </div>
    </div>


    <?php
    if ($tabliq != null) {
        $i=0;
        ?>
    <div class='row' style="margin-top: 20px !important;">

        <div class="carousel slide  g-c" data-ride="carousel" id="quote-carousel">


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
            <a data-slide="prev" href="#quote-carousel" class="left carousel-control lefta" style="background: none!important;">
                <i class="fa fa-chevron-left"></i></a>
            <a data-slide="next" href="#quote-carousel" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                <i class="fa fa-chevron-right"></i></a>
        </div>

    </div>

        <?php
    }
    ?>





    <div class="footer">
        <ul>
            <li><a href="<?= $url->createAbsoluteUrl(['site/postweb', 'title' => 'قوانین']) ?>">
                    <div class="into">
                        <span>  قوانین</span>
                        <i class="fa fa-file-text"></i>
                    </div>

                </a></li>
            <li><a href="<?= $url->createAbsoluteUrl(['site/contact']) ?>">
                    <div class="into">
                        <span> پیام ها</span>
                        <i class="fa fa-comment"></i>
                    </div>
                </a></li>
            <li><a href="<?= $url->createAbsoluteUrl(['site/postweb', 'title' => 'تماس با ما']) ?>">
                    <div class="into">
                        <span>تماس با ما</span>
                        <i class="fa fa-phone"></i>
                    </div>
                </a></li>

        </ul>
    </div>

