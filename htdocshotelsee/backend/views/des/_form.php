<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;
/* @var $this yii\web\View */
/* @var $model backend\models\Tbldes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbldes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_khadamat')->dropDownList($statusArr)->label('خدمات') ?>
    
    <?= $form->field($model, 'filed')->fileInput()->label('عکسی را انتخاب کنید') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(TinyMCE::className()); ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
