<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblprofile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tblprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'id_user',
            'id_hotel',
            'name',
            'lastname',
            'mobile',
            'rome_number',
            'count_peapel',
            'img',
//            'date_enter',
//            'date_exit',
            ['attribute'=>'cod_manager',
                'value'=>function($model){
                    $cod_manager=explode('-',$model->cod_manager);
                    if(count($cod_manager)==3){
                        return $cod_manager[2];
                    }else{
                        return 'این کاربر موجوز ندارد ولی وارد هتل شده است لطفا به پشتیبان سایت اطلاع دهید';
                    }
                   
                }
            ],
            'role',
            'date_enter_id',
            'date_exit_ir',
            'username',
        ],
    ]) ?>

</div>
