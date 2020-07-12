<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblkhadamat */

$this->title = 'ثبت خدمات';
$this->params['breadcrumbs'][] = ['label' => 'Tblkhadamats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblkhadamat-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat'=>$cat,
    ]) ?>

</div>
