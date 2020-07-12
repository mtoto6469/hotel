<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbllink */

$this->title = 'تبلیغات';
$this->params['breadcrumbs'][] = ['label' => 'تبلیغات', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbllink-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
   

    ]) ?>

</div>
