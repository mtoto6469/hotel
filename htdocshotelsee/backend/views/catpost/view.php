<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcatpost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'دسته بندی', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcatpost-view" dir="rtl" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if($model->id_parent!=0){
        echo Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);

        echo Html::a('حذف', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ;
        }
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'id_parent',
//            'logo',
            'description',
            'title',
            'enable',
        ],
    ]) ?>

</div>
