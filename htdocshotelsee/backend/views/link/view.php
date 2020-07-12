<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbllink */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbllinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbllink-view" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id ,'status'=>$model->id_hotel], ['class' => 'btn btn-primary']) ?>
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
            'link',
            'title',
            'description:ntext',
            'alt',
//            'id_hotel',
        ],
    ]) ?>

</div>
