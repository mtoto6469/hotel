<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcathotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ثبت دسته هتل';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcathotel-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت دسته جدید', ['create','id'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',

            [
                'attribute'=> 'id_hotel',
                'value'=>'idHotel.name_hotel',

            ],
            'title',
            'position',
            
            ['attribute'=> 'logo',
                'format'=>'html',
                'value'=>function($model){
                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$model->logo.'" style="width:50px;height:50px">';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
