<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbldes */

$this->title = 'ثبت';
$this->params['breadcrumbs'][] = ['label' => 'Tbldes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldes-create" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'statusArr'=>$statusArr,
    ]) ?>

</div>
