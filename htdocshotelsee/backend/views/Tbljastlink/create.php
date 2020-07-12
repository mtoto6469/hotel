<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbljastlink */

$this->title = 'تبلیغات بدون عکس';
$this->params['breadcrumbs'][] = ['label' => 'تبلیغات', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbljastlink-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
