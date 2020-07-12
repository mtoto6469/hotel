<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblprofileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblprofile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_hotel') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'rome_number') ?>

    <?php // echo $form->field($model, 'count_peapel') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'date_enter') ?>

    <?php // echo $form->field($model, 'date_exit') ?>

    <?php // echo $form->field($model, 'cod_manager') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'date_enter_id') ?>

    <?php // echo $form->field($model, 'date_exit_ir') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
