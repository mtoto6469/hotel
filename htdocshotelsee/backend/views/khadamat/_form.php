<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblkhadamat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblkhadamat-form" style="text-align: right" dir="rtl">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'category')->dropDownList($cat) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'khadamat')->textarea(['rows' => 6])->hint('خدمات کلی که این مکان در اختیار مشتریان قرار میدهد را تعریف کنید') ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'roles')->textarea(['rows' => 6])->hint('در این قسمت هزینه های که بابت هر خدمات ارائه میشود / شرایط کلی استفاده از امکانات موجود/ و رایگان یا نبود امکانات را لیست کنید') ?>

    <?= $form->field($model, 'file5')->fileInput() ?>

    <?= $form->field($model, 'multyfile[]')->fileInput(['multiple' => true]) ?>

    <?php
    if(!$model->isNewRecord){
        ?>
        <div class="form-group field-tblkhadamat-sms_notification">
            <label class="control-label">آیا عکس های منو حذف شود؟</label>
            <input type="hidden" name="Tblkhadamat[sms_notification]" value="">
            <div id="img-notification">

                <label><input type="radio" name="imgno" value="1" checked=""> بله</label>
                <label> <input type="radio" name="imgno" value="0"> خیر</label>

            </div>

            <div class="help-block"></div>
        </div>
    <?php
    }
    ?>


    <?= $form->field($model, 'mobile')->textInput()->hint('حتما حتما شماره را بدون 0 وارد کنید مانند 9123333333') ?>

    <?= $form->field($model, 'sms_notification')->radioList([0=>'خیر',1=>'بله']) ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
