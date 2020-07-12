<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbhotel */

$this->title = '&#1579;&#1576;&#1578; &#1607;&#1578;&#1604;';
$this->params['breadcrumbs'][] = ['label' => 'Tbhotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbhotel-create" style="text-align: right ">

   

    <?= $this->render('_form', [
        'model' => $model,
        'cod_manager'=>$cod_manager,
    ]) ?>

</div>
