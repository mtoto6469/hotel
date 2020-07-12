<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'مدیریرت کاربران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-index" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('ثبت کارمند  جدید', ['singup','id'=>$id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_user',
            'id_hotel',
            'name',
            'lastname',
            'mobile',
//            'rome_number',
            //'count_peapel',
            //'img',
//            'date_enter',
//            'date_exit',
            ['attribute'=>'cod_manager',

                'label'=>'رمز عبور',
            ],
            
            //'role',
//            'date_enter_id',
//            'date_exit_ir',
            'username',

            ['class' => 'yii\grid\ActionColumn','template'=>' {delete}'],
        ],
    ]); ?>
</div>
