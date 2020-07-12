<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblprofiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblprofile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_hotel',
            'name',
            'lastname',
            //'mobile',
            //'rome_number',
            //'count_peapel',
            //'img',
            //'date_enter',
            //'date_exit',
            //'cod_manager',
            //'role',
            //'date_enter_id',
            //'date_exit_ir',
            //'username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
