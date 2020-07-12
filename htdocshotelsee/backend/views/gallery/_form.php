<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblgallery-form" style="text-align: right" dir="rtl">

    <?php $form = ActiveForm::begin(); ?>


    <br>
    

    <?php
    if($model->isNewRecord) {
        ?>
        <?= $form->field($model, 'file3')->fileInput()->label('عکس')->hint('برای گذاشت عکس  هتل روی عکس کلید کنید') ?>
        <img id="blah3" src="#" alt="" style="width:100%;height: 200px">

        <?php
    }else{?>
        <img id="blah3" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width:100%;height: 200px">
    <?php
    }

    ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'enabel')->radioList([0=>'no',1=>'yes']) ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
