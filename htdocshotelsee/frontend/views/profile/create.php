<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblprofile */

$this->title = 'ثبت نام در هتل';

?>
<div class="tblprofile-create">



    <?= $this->render('_form', [
        'model' => $model,
        'role'=>$role,
    ]) ?>

</div>
