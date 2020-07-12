<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbldesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbldes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_hotel') ?>

    <?= $form->field($model, 'id_khadamat') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'text') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>