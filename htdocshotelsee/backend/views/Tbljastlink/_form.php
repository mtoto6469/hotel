<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbljastlink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbljastlink-form" style="text-align: right" dir="rtl">
<br><br>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>
    <br>
    <?php ActiveForm::end(); ?>

</div>
