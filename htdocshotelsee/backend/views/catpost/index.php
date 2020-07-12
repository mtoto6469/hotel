<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcatpostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'دسته بندی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcatpost-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ثبت دسته جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_parent',
//            'logo',
            'description',
            'title',
            //'enable',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}{update}'],
        ],
    ]); ?>
</div>
