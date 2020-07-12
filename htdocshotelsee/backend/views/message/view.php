<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblmessage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblmessages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-view" dir="rtl" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

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
//            'id_hotel',
            'id_user',
            'text:ntext',
        ],
    ]) ?>

</div>

