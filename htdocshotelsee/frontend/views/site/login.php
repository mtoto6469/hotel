<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';

?>

<div class="site-signup" dir="rtl" style="text-align: center">


    <div class="im" >
        <img src="<?=Yii::$app->request->hostInfo?>/upload/logohotelsee.jpeg" alt="hotelss">
    </div>
    <div class="row" style="text-align: center">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری') ?>


            <?= $form->field($model, 'password')->passwordInput()->label('رمز عبور') ?>

            <div class="form-group">
                <?= Html::submitButton('ورود', ['class' => 'btn btn-default btn-green', 'name' => 'signup-button']) ?>
            </div>

          
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

