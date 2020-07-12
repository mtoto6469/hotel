<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblroom */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tblrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblroom-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$model->id_hotel], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت اتاق جدید', ['create','id'=>$model->id_hotel], ['class' => 'btn btn-success']) ?>
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
            'id_hotel',
            'name',
            'number',
            ['attribute'=>'fill',
            'value'=>function($model){
               if($model->fill==0){
                   return 'خالی';
               } else{
                   return 'پر';
               }
            }],
          
        ],
    ]) ?>

</div>
