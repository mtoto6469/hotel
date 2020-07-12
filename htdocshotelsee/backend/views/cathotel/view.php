<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcathotel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'دسته خدمات', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcathotel-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$model->id_hotel], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت دسته جدید', ['index', 'id' => $model->id_hotel], ['class' => 'btn btn-success']) ?>
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
            'title',
            'position',

            ['attribute'=> 'logo',
                'format'=>'html',
                'value'=>function($model){
                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$model->logo.'" style="width:50px;height:50px">';
                }
            ],
        ],
    ]) ?>

</div>
