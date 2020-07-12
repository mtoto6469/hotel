<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblkhadamatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'خدمات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblkhadamat-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ثبت خدمات جدید', ['create','id_hotel'=>$id], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_hotel',
            'category',
            'name',
            'phone',
            //'khadamat:ntext',
            //'location',
            //'roles:ntext',
            //'img',
            //'img_menu',
            //'mobile',
            //'sms_notification',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
