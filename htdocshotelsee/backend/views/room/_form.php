<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblroom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblroom-form" style="text-align: right" dir="rtl">
    <?php
    if(isset($_SESSION['errorf'])){
        if($_SESSION['errorf']!=null){
            echo  '<div class="alert alert-danger">'.$_SESSION['errorf'].'</div>';
        }$_SESSION['errorf']=null;
    }
    ?>

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'name')->dropDownList(['A'=>'A','B'=>'B','C'=>'C','D'=>'D','none'=>'هیچکدام'])?>

    <?= $form->field($model, 'number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
