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
            //'mobile',
            'rome_number',
            //'count_peapel',
            //'img',
//            'date_enter',
//            'date_exit',
            ['attribute'=>'cod_manager',
                'value'=>function($model){
                    $cod_manager=explode('-',$model->cod_manager);
                    if(count($cod_manager)==3){
                        return $cod_manager[2];
                    }else{
                        return '<span style="color: red">'.'این کاربر موجوز ندارد ولی وارد هتل شده است <br>لطفا به پشتیبان سایت اطلاع دهید'.'</span>';
                    }
                },
                'format'=>'html',
            ],
            
            //'role',
            'date_enter_id',
            'date_exit_ir',
            'username',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {delete}'],
        ],
    ]); ?>
</div>
