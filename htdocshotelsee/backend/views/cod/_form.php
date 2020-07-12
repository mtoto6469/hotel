<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcod-form" style="text-align: right" dir="rtl">

    <?php $form = ActiveForm::begin(); ?>
    <select class="form-control" name="select">
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="300">300</option>
        <option value="500">500</option>
        <option value="1000">1000</option>

    </select>

    <div class="form-group">
        <?= Html::submitButton('دریافت کد', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
