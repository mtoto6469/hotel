<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;
/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container" style="padding:2% 7%">
    <div class="tbhotel-form" style="text-align: right !important;" dir="rtl">
        
        
        <br>
        <br>
        
        <?php
        if(isset($_SESSION['error'])){
            if($_SESSION['error']!=null){
                echo '<div class="alert alert-warning">'.$_SESSION['error'].'</div>';
            }$_SESSION['error']=null;
        }
        ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cat')->dropDownList($cat) ?>

    <?= $form->field($model, 'descriptipn')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'text')->widget(TinyMCE::className()); ?>


   <?= $form->field($model, 'meta')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>