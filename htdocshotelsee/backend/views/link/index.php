<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbllinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تبلیغات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbllink-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if($id!=0){
            ?>
            <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
            <?php
        }
        ?>
        <?= Html::a('ثبت تبلیغ جدید', ['create','status'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            //'alt',
            //'id_hotel',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}{delete}'],
        ],
    ]); ?>
</div>
