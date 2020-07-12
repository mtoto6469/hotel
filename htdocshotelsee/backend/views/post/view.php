<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'پست', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpost-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'descriptipn',
            'meta',
            'keyword',
            ['attribute'=>'text',
            'format'=>'html']

        ],
    ]) ?>

</div>
