<?php

?>

<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<div style="text-align: right;padding: 2%" dir="rtl">

    <h3>  نام کاربری :   <?=$name?></h3>
    <label>پسورد جدید را وارد کنید</label>
    <input name="password" type="password" class="form-control">


    <div class="form-group">
        <?= Html::submitButton('ویرایش', ['class' => 'btn btn-create']) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>