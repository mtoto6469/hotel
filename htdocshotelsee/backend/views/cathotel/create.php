<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcathotel */

$this->title = 'ثبت دسته';
$this->params['breadcrumbs'][] = ['label' => 'دسته خدمات', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcathotel-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
