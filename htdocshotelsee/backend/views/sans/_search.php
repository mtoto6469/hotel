<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblsansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblsans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_khadamat') ?>

    <?= $form->field($model, 'day_of_weeken') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'women_men') ?>

    <?php // echo $form->field($model, 'descrition') ?>

    <?php // echo $form->field($model, 'id_hotel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
