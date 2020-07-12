<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';

?>

<div class="site-login" dir="rtl" style="text-align:center;padding: 10px 0">



    <div class="container" style="text-align: center" dir="rtl">



        <div class="tab-content" >

            <?php
            if(isset($_SESSION['resultSign'])){
                if($_SESSION['resultSign']!=null){
                    echo '<div class="alert alert-danger">'.$_SESSION['resultSign'].'</div>';
                }$_SESSION['resultSign']=null;
            }
            ?>

            <div class="img-sig" >
                <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$image?>" alt="<?=$name?>">
                <p><?=$name?></p>
            </div>
            <?php
            if($role =='manager'){
                ?>
                <div   style="text-align: right">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="col-xs-6 col-sm-6" style="padding-left: 0!important;">
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'رمز عبور']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding-right: 0!important;">
                        <?= $form->field($model, 'username')->textInput(['placeholder' => 'نام کاربری']) ?>
                    </div>

                    <div class="col-xs-6 col-sm-6" style="padding-left: 0!important;">
                        <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'نام خانوادگی ']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding-right: 0!important;">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'نام ']) ?>
                    </div>

                    <?= $form->field($model, 'mobile')->textInput(['placeholder' => 'شماره تماس ']) ?>

                    <?= $form->field($model, 'cod_manager')->textInput(['placeholder' => 'کد مدیریت']) ?>

                    <?= $form->field($model, 'file')->fileInput()?>

                    <?= $form->field($model, 'role')->hiddenInput(['value'=>'manager'])->label(' ')?>




                    <div class="form-group">
                        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-default btn-blue']) ?>
                    </div>
                    <div class="hr-orang"></div>
                    <div class="img-sig" style="text-align: center" >
                        <p>    <a  href="<?=Yii::$app->urlManager->createAbsoluteUrl(['site/login'])?>">ورود</a></p>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div>
                <?php
            }
            ?>










            <?php
            if($role =='user'){
                ?>
                <div  style="text-align: right">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="col-xs-6 col-sm-6" style="padding-left: 0!important;">
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'رمز عبور']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding-right: 0!important;">
                        <?= $form->field($model, 'username')->textInput(['placeholder' => 'نام کاربری']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding-left: 0!important;">
                        <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'نام خانوادگی ']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding-right: 0!important;">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'نام ']) ?>
                    </div>

                    <?= $form->field($model, 'mobile')->textInput(['placeholder' => 'شماره تماس ']) ?>

                    <?= $form->field($model, 'phase')->dropDownList(['A'=>'A','B'=>'B','C'=>'C','D'=>'D','none'=>'هیچکدام'],['placeholder' => 'شماره تماس ']) ?>

                    <?= $form->field($model, 'rome_number')->dropDownList($room,['placeholder' => 'شماره اتاق ']) ?>
                    <?php
                    for($i=1;$i<=15;$i++){
                        $count[$i]=$i;

                    }
                    ?>

                    <?= $form->field($model, 'count_peapel')->dropDownList($count)?>

                    <?= $form->field($model, 'cod_manager')->textInput(['placeholder' => 'کد کاربری'])->label('کد کاربری') ?>

                    <?= $form->field($model, 'file')->fileInput()?>
                    <div class="col-xs-6 col-sm-6">
                        <?= $form->field($model, 'date_exit_ir')->textInput(['placeholder' => 'تاریخ خروج']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <?= $form->field($model, 'date_enter_id')->textInput(['placeholder' => 'تاریخ ورود به هتل']) ?>
                    </div>


                    <?= $form->field($model, 'role')->hiddenInput(['value'=>'user'])->label(' ')?>




                    <div class="form-group">
                        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-default btn-blue']) ?>
                    </div>
                    <div class="hr-orang"></div>
                    <div class="img-sig" style="text-align: center" >
                        <p>    <a  href="<?=Yii::$app->urlManager->createAbsoluteUrl(['site/login'])?>">ورود</a></p>
                    </div>



                    <?php ActiveForm::end(); ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


</div>
