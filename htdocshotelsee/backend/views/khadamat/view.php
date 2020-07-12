<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblkhadamat */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tblkhadamats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblkhadamat-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$model->id_hotel], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت زمان بندی', ['sans/create','status'=>$model->id,'id_hotel'=>$model->id_hotel], ['class' => 'btn btn-success']) ?>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'id_hotel',
            'category',
            'name',
            'phone',
            'khadamat:ntext',
            'location',
            'roles:ntext',
            'img',
            'img_menu',
            'mobile',
            'sms_notification',
        ],
    ]) ?>

</div>
