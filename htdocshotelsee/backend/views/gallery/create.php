<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */

$this->title = 'ثبت عکس جدید';
$this->params['breadcrumbs'][] = ['label' => 'گالری', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblgallery-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
