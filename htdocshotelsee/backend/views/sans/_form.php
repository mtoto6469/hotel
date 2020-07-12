<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblsans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblsans-form" style="text-align: right" dir="rtl">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'day_of_weeken')->dropDownList($days) ?>
    <?php
    if($statusArr!=0 || !$model->isNewRecord){
        ?>
        <?= $form->field($model, 'id_khadamat')->dropDownList($statusArr)->label('خدمات') ?>
    <?php
    }
    ?>
   

    <?= $form->field($model, 'time')->textInput(['maxlength' => true])->hint('زمان را میتوانید به صورت بازه زمانی مشخص کنید مانند 11-12') ?>

    <?= $form->field($model, 'women_men')->dropDownList(['بانوان/ آقایان'=>'هردو','بانوان'=>'بانوان','آقایان'=>'آقایان']) ?>

    <?= $form->field($model, 'descrition')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
