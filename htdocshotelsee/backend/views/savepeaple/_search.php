<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblsavepeapleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblsavepeaple-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_hotel') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tell') ?>

    <?= $form->field($model, 'namehotel') ?>

    <?php // echo $form->field($model, 'date_enter') ?>

    <?php // echo $form->field($model, 'date_enter_ir') ?>

    <?php // echo $form->field($model, 'date_exit') ?>

    <?php // echo $form->field($model, 'date_exit_ir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
