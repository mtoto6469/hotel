<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbldes */

$this->title = 'ویرایش';
$this->params['breadcrumbs'][] = ['label' => 'Tbldes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbldes-update" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'statusArr'=>$statusArr,
    ]) ?>

</div>
