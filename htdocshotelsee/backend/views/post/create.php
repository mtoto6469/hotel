<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */

$this->title = 'ثبت پست جدید';
$this->params['breadcrumbs'][] = ['label' => 'پست', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpost-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat'=>$cat,

    ]) ?>

</div>
