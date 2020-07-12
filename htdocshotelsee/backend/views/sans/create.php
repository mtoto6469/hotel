<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblsans */

$this->title = 'ثبت زمان بندی';
$this->params['breadcrumbs'][] = ['label' => 'زمان بندی ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblsans-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'days'=>$days,
        'statusArr'=>$statusArr,
    ]) ?>

</div>
