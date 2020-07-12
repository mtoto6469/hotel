
<?php


use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';

?>

<div class="site-login" dir="rtl" style="text-align:center;padding: 10px 0;height: 100%">

    <?php
    if(isset($_SESSION['result'])){
        if($_SESSION['result']!=null){
            echo '<div>'.$_SESSION['result'].'</div>';
        }$_SESSION['result']=null;
    }
    ?>


    <div class="container" style="text-align: center;height: 100%" dir="rtl">



        <div class="tab-content" style="height: 100%">


<br><br>
            <?php $form = ActiveForm::begin(); ?>
            <button class="btn btn-danger" name="btn" value="m">ثبت نام به عنوان مدیر</button><br><br>

            <button class="btn btn-primary" name="btn" value="u">ثبت نام به عنوان کاربر</button>


            <?php ActiveForm::end(); ?>

        </div>
    </div>


</div>

