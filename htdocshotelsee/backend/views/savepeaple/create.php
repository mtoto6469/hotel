<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblsavepeaple */

$this->title = 'Create Tblsavepeaple';
$this->params['breadcrumbs'][] = ['label' => 'Tblsavepeaples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblsavepeaple-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
