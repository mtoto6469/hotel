<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbhotel */

$this->title = $model->name_hotel;
$this->params['breadcrumbs'][] = ['label' => 'هتل ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbhotel-view" style="text-align: right" dir="rtl">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name_hotel',
            'name_hotel_en',
            'name_manager_hotel',
            'address_hotel',
            'addrerss_hotel_en',
//            'city_hotel',
//            'city_hotel_en',
            'status_star',
//            'map_x',
//            'map_y',
            'phone',
            'mobile_manager',
            ['attribute'=> 'logo_hotel',
                'format'=>'html',
            'value'=>function($model){
                return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$model->logo_hotel.'" style="width:50px;height:50px">';
            }
            ],

//            'date',
            'time:datetime',
            'time_end:datetime',
            ['attribute'=> 'general_information',
                'format'=>'html',],
            ['attribute'=> 'general_information_en',
                'format'=>'html',],
            ['attribute'=> 'space',
                'format'=>'html',],
            ['attribute'=> 'space_en',
                'format'=>'html',],
            ['attribute'=> 'roles',
                'format'=>'html',],
            ['attribute'=> 'roles_en',
                'format'=>'html',],
            ['attribute'=>'cod_manager',
                'value'=>function($model){
                    $cod_manager=explode('-',$model->cod_manager);
                    return $cod_manager[2];
                }
            ],

        ],
    ]) ?>

</div>
