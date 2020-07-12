<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'گالری', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblgallery-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به گالری', ['index', 'id' => $model->id_hotel], ['class' => 'btn btn-success']) ?>
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
            ['attribute'=> 'img',
                'format'=>'html',
                'value'=>function($model){
                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$model->img.'" style="width:50px;height:50px">';
                }
            ],
            ['attribute'=> 'img',
                'label'=>'لینک عکس',
                'value'=>function($model){
                    return Yii::$app->request->hostInfo.'/upload/'.$model->img;
                }
            ],
           
            'alt',
            'description',
        ],
    ]) ?>

</div>
