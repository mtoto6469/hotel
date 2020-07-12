<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ایجاد کد کاربر';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcod-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ایجاد کد کاربر جدبد', ['create','id'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn','template'=>''],
        ],
    ]); ?>
</div>
