<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbhotelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbhotel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_hotel') ?>

    <?= $form->field($model, 'name_hotel_en') ?>

    <?= $form->field($model, 'name_manager_hotel') ?>

    <?= $form->field($model, 'address_hotel') ?>

    <?php // echo $form->field($model, 'addrerss_hotel_en') ?>

    <?php // echo $form->field($model, 'city_hotel') ?>

    <?php // echo $form->field($model, 'city_hotel_en') ?>

    <?php // echo $form->field($model, 'status_star') ?>

    <?php // echo $form->field($model, 'map_x') ?>

    <?php // echo $form->field($model, 'map_y') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'mobile_manager') ?>

    <?php // echo $form->field($model, 'logo_hotel') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'time_end') ?>

    <?php // echo $form->field($model, 'general_information') ?>

    <?php // echo $form->field($model, 'general_information_en') ?>

    <?php // echo $form->field($model, 'space') ?>

    <?php // echo $form->field($model, 'space_en') ?>

    <?php // echo $form->field($model, 'roles') ?>

    <?php // echo $form->field($model, 'roles_en') ?>

    <?php // echo $form->field($model, 'suite') ?>

    <?php // echo $form->field($model, 'restuarant') ?>

    <?php // echo $form->field($model, 'internet') ?>

    <?php // echo $form->field($model, 'parking') ?>

    <?php // echo $form->field($model, 'prayer_room') ?>

    <?php // echo $form->field($model, 'lobby') ?>

    <?php // echo $form->field($model, 'sport_hall') ?>

    <?php // echo $form->field($model, 'store') ?>

    <?php // echo $form->field($model, 'coffe_shop') ?>

    <?php // echo $form->field($model, 'net_in_lobby') ?>

    <?php // echo $form->field($model, 'snooker') ?>

    <?php // echo $form->field($model, 'jaccuzzi') ?>

    <?php // echo $form->field($model, 'sanna') ?>

    <?php // echo $form->field($model, 'photography') ?>

    <?php // echo $form->field($model, 'laundry') ?>

    <?php // echo $form->field($model, 'car_rental') ?>

    <?php // echo $form->field($model, 'cleaning') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
