<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblsans */

$this->title = 'ویرایش ' . $model->descrition;
$this->params['breadcrumbs'][] = ['label' => 'Tblsans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblsans-update" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'days'=>$days,
        'statusArr'=>$statusArr,
    ]) ?>

</div>
