<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbldesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'توضیجات بیشتر';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldes-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>

        <?= Html::a('ثبت توضیحات جدید', ['create','id_hotel'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_hotel',

            [
                'attribute'=> 'id_khadamat',
                'value'=>'idKhadamat.name',

            ],
            'logo',
            'title',
            //'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
