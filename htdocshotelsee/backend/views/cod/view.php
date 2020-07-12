<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcod */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblcods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcod-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$model->id_hotel], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            ['attribute'=>'code',
                'value'=>function($model){
                    $cod_manager=explode('-',$model->code);
                    if(count($cod_manager)==3){
                        return $cod_manager[2];
                    }else{
                        return '-';
                    }
                }
            ],
            'enable',
        ],
    ]) ?>

</div>
