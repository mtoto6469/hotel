<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbllink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbllink-form" style="text-align: right" dir="rtl">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file')->fileInput()->label('عکس')->hint('برای گذاشت عکس  هتل روی عکس کلید کنید') ?>
   
    <?php
    if(!$model->isNewRecord){?>

        <img id="blah2" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width:100%;height: 200px">


    <?php
    }else{
        echo '<img id="blah2" src="#" alt="" style="width:100%;height: 200px">';

    }

    ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?php
    if($_GET['status']==0){
        ?>
        <?= $form->field($model, 'status')->dropDownList(['index'=>'صفحه اصلی','hotel'=>'صفحه هتل ها'])?>
    <?php
    }
    ?>
    

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alt')->textInput() ?>

    


    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
