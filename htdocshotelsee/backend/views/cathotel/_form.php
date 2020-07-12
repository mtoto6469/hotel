<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcathotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcathotel-form" style="text-align: right" dir="rtl">
    <?php
    if(isset($_SESSION['error'])){
        if($_SESSION['error']!=null){
            echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
        }$_SESSION['error']=null;
    }
    ?>

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true])->hint('توجه داشته باشید که هر خدماتی که الویت بیشتری داشته باشند در اپ در مکان جلوتر قرار خواهند گرفت') ?>

    <?= $form->field($model, 'fileh')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
