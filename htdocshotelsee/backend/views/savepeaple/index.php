<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblsavepeapleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'لیست مسافران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblsavepeaple-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_hotel',
            'name',
            'tell',
            'namehotel',
            //'date_enter',
            'date_enter_ir',
            //'date_exit',
            'date_exit_ir',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
