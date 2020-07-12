<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcatpost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcatpost-form" style="text-align: right" dir="rtl">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if(!$model->isNewRecord  && $error==1){

        if(isset($_SESSION['error'])){
            echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
        }
        echo Html::a('بازگشت', ['index'], ['class' => 'btn btn-success']);
    }else{?>
    <?= $form->field($model, 'id_parent')->dropDownList($cat)?>

    <?= $form->field($model, 'filec')->fileInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->radioList([0=>'خیر',1=>'بله']) ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>
   <?php
    }
    ?>



    <?php ActiveForm::end(); ?>

</div>
