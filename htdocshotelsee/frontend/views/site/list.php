<?php
use frontend\models\AuthAssignment;

$url=Yii::$app->urlManager;
?>

<div class="report">
    
    <?php
    if($list!=null){
        
        foreach ($list as $l){
           
            ?>
    
            <div class="list">
                <span>نام و نام خانوادگی</span><br>
                <b><?=$l->name.'  '.$l->lastname?></b><br>
                <span>َشماره اتاق  </span><b><?=$l->rome_number?></b><br>
                <?php
                if($l->phase!='none'){
                    ?>
                    <span>فاز</span><b><?=$l->phase?></b><br>
                    <?php
                }
                ?>
                <span>   شماره تماس  </span><b><?=$l->mobile?></b><br>
                <span>   تاریخ ورود: </span><b><?=$l->date_enter_id?></b><br>
                <span>   تاریخ خروج:  </span><b><?=$l->date_exit_ir?></b>
                <?php
                if($l->img!=null){
                    ?>
                    <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$l->img?>" alt="imguser">

                    <?php
                }
                ?>
            </div>

    <?php
        }
        
    }else{
        echo '<div class="alert alert-info" style="text-align: right">در حال حاضر این لیست خالی می باشد</div>';

    }
    ?>

    <?php
    $item_role=AuthAssignment::findOne(['user_id'=>Yii::$app->user->getId()]);
    if($item_role!=null && $item_role->item_name=='admin'){
        ?>
        <a class="back" href="<?=$url->createAbsoluteUrl(['site/report','id_hotel'=>$id_hotel])?>">بازگشت</a>
        <?php
    }else{
        ?>
        <a class="back" href="<?=$url->createAbsoluteUrl(['site/report'])?>">بازگشت</a>
    <?php
    }
    ?>

</div>
