<?php

use yii\helpers\Html;
use yii\grid\GridView;
$url=Yii::$app->urlManager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblgallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'گالری';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblgallery-index" style="text-align: right">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if($id!=0){
            ?>
            <?= Html::a('بازگشت به صفحه هتل', ['site/newhotel','id'=>$id], ['class' => 'btn btn-info']) ?>
        <?php
        }
        ?>

        <?= Html::a('ثبت عکس جدید برای این هتل', ['create','status'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    
    
    
<div class="gallery">

<div class="row">

    <?php
    $img=\backend\models\Tblgallery::find()->where(['id_hotel'=>$id])->all();
    if($img!=null){
        foreach ($img as $i){
            $ex=explode('.',$i->img);
            ?>
            <div class="col-md-3">
                <div class="imgall">
                    <div class="img">
                        <?php
                        if($ex[1]=="mp4"){?>
                            <video controls style="width: 250px; height: 170px;">
                                <source src="<?=Yii::$app->request->hostInfo?>/upload/<?=$i->img?>" type="video/mp4">
                            </video>
                        <?php
                        }else{?>
                            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$i->img?>">
                        <?php
                        }
                        ?>

                    </div>
                  
                    <div class="del-up">
                        <a href="<?=$url->createAbsoluteUrl(['gallery/update','id'=>$i->id])?>" class="red">حذف</a><br>
                        <a href="<?=$url->createAbsoluteUrl(['gallery/update','id'=>$i->id])?>" class="blue">ویرایش</a>
                        <a href="<?=$url->createAbsoluteUrl(['gallery/view','id'=>$i->id])?>" class="green">نمایش</a><br>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>


</div>


   
</div>
    
    
    
</div>
