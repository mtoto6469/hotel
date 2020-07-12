<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\models\AuthAssignment;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$url=Yii::$app->urlManager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<body>
<div id="wrap-hidden" style="display: none;"></div>

    <nav id="navigation" style="padding-right:20px">
        <span onclick="openNav()" class="fa fa-bars"></span>
        <h1>HotelSee</h1>
        <i class="fa fa-search " onclick="openSearch()"></i>
     

    </nav>
<?php $form = ActiveForm::begin(['action' => ['site/search']]); ?>
    <nav id="navigation2">
        <a href="javascript:void(0)" class="closebtn" onclick="closeSearch()">&times;</a>
        <input placeholder="نام هتل را وارد کنید" name="name">
        <button ><i class="fa fa-search " ></i></button>

    </nav>

<?php ActiveForm::end(); ?></div>


        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>



<div id="mySidenav" class="sidenav">
    <div class="header-side">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <img src="<?=Yii::$app->request->hostInfo?>/upload/logohotelsee.jpeg" alt="hotelss">


    </div>
    <ul class="ul-side">

        <li>
            <i class="fa fa-home "></i><a href="<?=$url->createAbsoluteUrl(['site/index'])?>">صفحه اصلی</a>
        </li>
        <li>
            <i class="fa fa-home "></i><a href="<?=$url->createAbsoluteUrl(['site/hotels'])?>">لیست هتل ها</a>
        </li>

        <li>
            <i class="fa fa-picture-o" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/gallery'])?>">گالری</a>
        </li>
        <div class="line"></div>
        <li>
            <i class="fa fa-question" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/cat','id'=>8])?>">درباره کیش</a>
        </li>
        <li>
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/postweb','title'=>'قوانین'])?>">قوانین</a>
        </li>
        <div class="line"></div>
        <li>
            <i class="fa fa-envelope" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/contact'])?>">نظرسنجی و ارسال پیام</a>
        </li>
        <li>
            <i class="fa fa-file-text-o" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/postweb','title'=>'درباره ما'])?>">درباره ما</a>
        </li>
        <li>
            <i class="fa fa-phone" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/postweb','title'=>'تماس با ما'])?>">تماس با ما</a>
        </li>
        <div class="line"></div>

        <?php
        if(!Yii::$app->user->isGuest){
            $role=\frontend\models\AuthAssignment::findOne(['user_id'=>Yii::$app->user->getId()]);
            if($role->item_name=='manager'){
                ?>

                <li>
                    <i class="fa file-text-o" aria-hidden="true"></i><a href="<?=$url->createAbsoluteUrl(['site/report'])?>">پنل مدیریت</a>
                </li>
                <div class="line"></div>
        <?php
            }
        }
        ?>

        <?php
        if(!Yii::$app->user->isGuest){
            ?>
            <?php
            $role=AuthAssignment::findOne(['user_id'=>Yii::$app->user->getId()]);
            if($role->item_name!='admin' && $role->item_name!="employee"){
                ?>
                <li>
                    <i class="fa fa-sign-out" ></i><a href="<?=$url->createAbsoluteUrl(['profile/update'])?>">پروفایل</a>
                </li>
                <?php
            }
            ?>

            <li>
                <i class="fa fa-sign-out" ></i><a href="<?=$url->createAbsoluteUrl(['site/logout'])?>">خروج</a>
            </li>
        <?php
        }else{
            ?>
            <li>
                <i class="fa fa-sign-out" ></i><a href="<?=$url->createAbsoluteUrl(['site/login'])?>">ورود</a>
            </li>

        <?php
        }
        ?>


    </ul>

</div>

</body>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
