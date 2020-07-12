<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';

?>

<div class="site-login" dir="rtl" style="text-align:center;padding: 10px 0">



    <div class="container" style="text-align: center" dir="rtl">



        <div class="tab-content" >

            <?php
            if(isset($_SESSION['resultSign'])){
                if($_SESSION['resultSign']!=null){
                    echo '<div class="alert alert-danger">'.$_SESSION['resultSign'].'</div>';
                }$_SESSION['resultSign']=null;
            }
            ?>



                <div   style="text-align: right">

                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'username')->textInput() ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>


                    <?= $form->field($model, 'name')->textInput() ?>

                        <?= $form->field($model, 'lastname')->textInput() ?>




                    <?= $form->field($model, 'role')->hiddenInput(['value'=>'employee'])->label(' ')?>

                    <?= $form->field($model, 'mobile')->textInput()?>



                    <div class="form-group">
                        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-default btn-blue']) ?>
                    </div>



                    <?php ActiveForm::end(); ?>
                </div>



        </div>
    </div>


</div>
