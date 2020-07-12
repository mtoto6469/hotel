<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblsansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'زمان بندی جدید';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblsans-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت زمان بندی', ['create','status'=>0,'id_hotel'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_khadamat',
            [
                'attribute'=> 'id_khadamat',
                'value'=>'idKhadamat.name',
                'label'=>'خدمات'

            ],
            'day_of_weeken',
            'time',
            'women_men',
            //'descrition',
//            'id_hotel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
