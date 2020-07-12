<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblroom */

$this->title = 'ثبت اتاق های هتل';
$this->params['breadcrumbs'][] = ['label' => 'اتاق های هتل', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblroom-create" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
