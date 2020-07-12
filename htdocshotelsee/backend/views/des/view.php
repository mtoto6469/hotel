<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbldes */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbldes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldes-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$model->id_hotel], ['class' => 'btn btn-info']) ?>
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
//            'id',
//            'id_hotel',
            'id_khadamat',
            'logo',
            'title',
            'text:ntext',
        ],
    ]) ?>

</div>
