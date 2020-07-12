<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;


if(isset($_SESSION['errorsite'])){
    if($_SESSION['errorsite']!=null){
        $this->title = $_SESSION['errorsite'];
        $_SESSION['errorsite']=null;
    }else{
        $this->title ='اطلاعاتی یافت نشد';
    }
}else{
    $this->title ='اطلاعاتی یافت نشد';
}
?>
<div class="site-error" style="padding:7%;text-align: center;background:white">

    <h1 style="font-family: 'B yekan'"><?= Html::encode($this->title) ?></h1>




</div>
