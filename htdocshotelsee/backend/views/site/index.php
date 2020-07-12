<?php

/* @var $this yii\web\View */

$this->title = 'پنل مدیریت';
if(isset($_SESIION['sin'])){
    if($_SESSION['sin']!=null){
        echo '<div class="alert alert-success" style="text-align: center">'.$_SESSION['sin'].'</div>';
    }$_SESSION['sin']=null;
}
?>

