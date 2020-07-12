<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbhotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbhotels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbhotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbhotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_hotel',
            'name_hotel_en',
            'name_manager_hotel',
            'address_hotel',
            ['attribute'=>'cod_manager',
            'value'=>function($model){
                $cod_manager=explode('-',$model->cod_manager);
                return $cod_manager[2];
            }
            ],
            'hom_count',
            //'addrerss_hotel_en',
            //'city_hotel',
            //'city_hotel_en',
            //'status_star',
            //'map_x',
            //'map_y',
            //'phone',
            //'mobile_manager',
            //'logo_hotel',
            //'date',
            //'time:datetime',
            //'time_end:datetime',
            //'general_information:ntext',
            //'general_information_en:ntext',
            //'space:ntext',
            //'space_en:ntext',
            //'roles:ntext',
            //'roles_en:ntext',
   

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
