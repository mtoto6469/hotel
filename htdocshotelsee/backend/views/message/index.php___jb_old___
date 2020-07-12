<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblmessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پیام ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-index" style="text-align: right" dir="rtl">

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
        <?= Html::a('پیام ها', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_hotel',
            'id_user',
            'text:ntext',

            ['class' => 'yii\grid\ActionColumn' ,'template'=>'{view} {delete} '],
        ],
    ]); ?>
</div>
