<?php
?>

<div  style="min-height: 100px;padding-bottom: 10px ">

    <?php
    if($tabliq!=null){
        ?>
    <div class="row" style="min-height:10px;padding: 0 8px!important;">
        <?php
        foreach ($tabliq as $t){
            ?>
            <div class="box">

                <div class="overlay "></div>
                <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$t->img?>" alt="<?=$t->alt?>">

                <h5><?=$t->title?></h5>

                <span><?=$t->description?></span>

            </div>
          
        <?php
        }
        ?>
    </div>
    <?php
    }
    ?>









<?php
if($hotel!=null){
    ?>

    <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$hotel->logo_hotel?>" style="width: 100%;height: 130px;padding: 5px 8px!important;">
    <div class="header-hotel">

        <h1> <?=$hotel->name_hotel?></h1><span> <?=$hotel->name_hotel_en?></span>
        <div class="i">
            <?php
            if($hotel->status_star=="apartment"){?>
                <span>هتل آپارتمان</span>
            <?php
            }
            if($hotel->status_star=="1star"){?>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star i"></i>
                <i class="fa fa-star i"></i>
                <i class="fa fa-star i"></i>
                <i class="fa fa-star i"></i>
                <?php

            }
            if($hotel->status_star=="2star"){?>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star i"></i>
                <i class="fa fa-star i"></i>
                <i class="fa fa-star i"></i>
                <?php

            }
            if($hotel->status_star=="3star"){?>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star i"></i>
                <i class="fa fa-star i"></i>
                <?php

            }
            if($hotel->status_star=="4star"){?>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star i"></i>
                <?php

            }
            if($hotel->status_star=="5star"){?>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <i class="fa fa-star c"></i>
                <?php
            }
            ?>

        </div>





    </div>

    <!--    امکانات-->

    <div class="notification ">
        <span>امکانات</span>
        <div class="flag">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-ir.jpg" onclick="irM()" alt="ir">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-en.png" onclick="enM()" alt="en">



        </div>
    </div>

    <div class="notification-text" id="irM">
        <div class="d" style="display: inline-block">
            <div class="log1" >
                <img src="<?=Yii::$app->request->hostInfo?>/upload/15.png"><br>
                <span>بشیبشبشب</span>
            </div>
            <div class="log1">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/gallery.png"><br>
                <span>بشیبشبشب</span>
            </div>
            <div class="log1">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/gallery.png"><br>
                <span>بشیبشبشب</span>
            </div>
            <div class="log1">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/gallery.png"><br>
                <span>بشیبشبشب</span>
            </div>
            <div class="log1">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/gallery.png"><br>
                <span>بشیبشبشب</span>
            </div>
        </div>

    </div>
    <div class="notification-text" id="enM" style="display: none;">
        <div class="d" style="display: inline-block">

            <div class="log2">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/gallery.png">
                <br>
                <span>بشیبشبشب</span>
            </div>
            <div class="log2">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/gallery.png">
                <br>
                <span>بشیبشبشب</span>
            </div>
        </div>
    </div>
    <!--    امکانات-->



    <!--فاصله تا مراکز اصلی شهر-->

    <?php
    if($hotel->space!=null){?>
    <div class="notification ">
        <span>فاصله تا مراکز اصلی شهر</span>
        <div class="flag">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-ir.jpg" onclick="irF()" alt="ir">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-en.png" onclick="enF()" alt="en">



        </div>
    </div>

    <div class="notification-text" id="irF">
        <?=$hotel->space?>

</div>
    <div class="notification-text" id="enF" style="display: none">
        <?=$hotel->space_en?>
    </div>

   <?php
    }
    ?>

    <!--فاصله تا مراکز اصلی شهر-->



    <!--قوانین-->
    <?php
    if($hotel->roles!=null) {
        ?>
        <div class="notification ">
            <span>قوانین</span>
            <div class="flag">
                <img src="<?= Yii::$app->request->hostInfo ?>/upload/flag-ir.jpg" onclick="irQ()" alt="ir">
                <img src="<?= Yii::$app->request->hostInfo ?>/upload/flag-en.png" onclick="enQ()" alt="en">


            </div>
        </div>

        <div class="notification-text" id="irQ">
            <?= $hotel->roles ?>

        </div>
        <div class="notification-text" id="enQ" style="display: none">
            <?= $hotel->roles_en ?>
        </div>
        <?php
    }
        ?>
    <!--قوانین-->



    <!--نقشه هتل-->


    <div class="notification ">
        <span>نقشه هتل</span>
        <div class="flag">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-ir.jpg" onclick="irN()" alt="ir">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-en.png" onclick="enN()" alt="en">



        </div>
    </div>

    <div class="notification-text" id="irN">
        یبلیلیب
        بتینششششششششششششششششششششششششششششششششششششششششششششششششششششششششش
        یبشتبببببببببببببببب
        بیتشبببببببببببببب
        بیشتبببببببببببببب
        بیتشببببببببببب
    </div>


    <div class="notification-text" id="enN" style="display: none">
        dasd
    </div>
    <!--نقشه هتل-->








    <!--آدرس-->


    <div class="notification ">
        <span>آدرس</span>
        <div class="flag">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-ir.jpg" onclick="irA()" alt="ir">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/flag-en.png" onclick="enA()" alt="en">



        </div>
    </div>

    <div class="notification-text" id="irA">
        <span>  نام صاحب هتل </span>
        <p class="gray"><?=$hotel->name_manager_hotel?></p>

        <span > آدرس </span>
        <p class="gray"><?=$hotel->address_hotel?></p>

        <span >  شمار تماس ها </span>
        <p class="gray"><?=$hotel->phone?></p>

    </div>

    <div class="notification-text" id="enA" style="display: none">
        <span class="dark-blue">  Hotel owner </span>
        <p ><?=$hotel->name_manager_hotel?></p>

        <span class="dark-blue"> Address </span>
        <p ><?=$hotel->	addrerss_hotel_en?></p>

        <span class="dark-blue"> phone number </span>
        <p><?=$hotel->phone?></p>
    </div>
    <!--آدرس-->




    <!--توضیحات-->
    <?php
    if($hotel->general_information!=null) {
        ?>
        <div class="notification ">
            <span>توضیحات</span>
            <div class="flag">
                <img src="<?= Yii::$app->request->hostInfo ?>/upload/flag-ir.jpg" onclick="irT()" alt="ir">
                <img src="<?= Yii::$app->request->hostInfo ?>/upload/flag-en.png" onclick="enT()" alt="en">


            </div>
        </div>

        <div class="notification-text" id="irT">
            <?= $hotel->general_information ?>

        </div>
        <div class="notification-text" id="enT" style="display: none">
            <?= $hotel->general_information ?>
        </div>
        <?php
    }
    ?>
    <!--توضیحات-->

    <?php
}
?>
    



<script>
    function irM() {
    $('#enM').css("display","none");
    $('#irM').css("display","block");
    
    }

    function enM() {
        $('#irM').css("display","none");
        $('#enM').css("display","block");
    }


    //قوانین
    function irQ() {
        $('#enQ').css("display","none");
        $('#irQ').css("display","block");

    }

    function enQ() {
        $('#irQ').css("display","none");
        $('#enQ').css("display","block");
    }
    //قوانین

    //فاصله
    function irF() {
        $('#enF').css("display","none");
        $('#irF').css("display","block");

    }

    function enF() {
        $('#irF').css("display","none");
        $('#enF').css("display","block");
    }
    //فاصله


    //نقشه
    function irN() {
        $('#enN').css("display","none");
        $('#irN').css("display","block");

    }

    function enN() {
        $('#irN').css("display","none");
        $('#enN').css("display","block");
    }
    //نقشه

//address
    function irA() {
        $('#enA').css("display","none");
        $('#irA').css("display","block");

    }

    function enA() {
        $('#irA').css("display","none");
        $('#enA').css("display","block");
    }
    //address
    
//    توضیحات
    function irT() {
        $('#enT').css("display","none");
        $('#irT').css("display","block");

    }

    function enT() {
        $('#irT').css("display","none");
        $('#enT').css("display","block");
    }
//    توضیحات
</script>