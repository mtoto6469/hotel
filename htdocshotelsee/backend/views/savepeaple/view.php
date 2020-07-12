<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblsavepeaple */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tblsavepeaples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblsavepeaple-view" dir="rtl" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'id_hotel',
            'name',
            'tell',
            'namehotel',
//            'date_enter',
            'date_enter_ir',
//            'date_exit',
            'date_exit_ir',
        ],
    ]) ?>

</div>
