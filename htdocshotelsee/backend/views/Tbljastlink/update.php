<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbljastlink */

$this->title = 'ویرایش: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbljastlinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbljastlink-update" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>