<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcod */

$this->title = 'ایجاد کد';
$this->params['breadcrumbs'][] = ['label' => 'ایجاد کد', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcod-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
