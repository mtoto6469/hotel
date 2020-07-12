<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';

?>
<div class="site-signup" dir="rtl" style="text-align: right">
   


    <div class="row">
        <div class="col-lg-5">


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>


                <?= $form->field($model, 'password')->passwordInput() ?>


            <div class="form-group">
                    <?= Html::submitButton('ثبت نام', ['class' => 'btn btn-default btn-green', 'name' => 'signup-button']) ?>
                </div>
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
