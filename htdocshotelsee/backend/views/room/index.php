<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblroomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'اتاق ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblroom-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت اتاق جدید', ['create','id'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_hotel',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
