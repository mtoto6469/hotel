<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblprofile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tblprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'id_user',
            'id_hotel',
            'name',
            'lastname',
            'mobile',
            'rome_number',
            'count_peapel',
            'img',
            'date_enter',
            'date_exit',
            'cod_manager',
            'role',
            'date_enter_id',
            'date_exit_ir',
            'username',
        ],
    ]) ?>

</div>
