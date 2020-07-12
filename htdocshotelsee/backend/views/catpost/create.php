<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcatpost */

$this->title = 'Create Tblcatpost';
$this->params['breadcrumbs'][] = ['label' => 'دسته بندی ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcatpost-create" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat'=>$cat,

    ]) ?>

</div>
