<?php
use frontend\models\AuthAssignment;

$url=Yii::$app->urlManager;
?>

<div class="message-ma">
    
    <?php
    if($message!=null){
        
        foreach ($message as $m){
          
            ?>
    
            <div class="box-message">
                <?php
                $pro=\frontend\models\Tblprofile::findOne(['id_user'=>$m->id_user]);
                if($pro!=null){
                    $name=$pro->name.' '.$pro->lastname;
                }else{
                    $name='نا شناس';
                }
                ?>
                <span><?=$name?></span>
                <div class="text">   <?=$m->text?>
                    
                  </div>

                <div class="row">
                    <a class=" btn-red" href="<?=$url->createAbsoluteUrl(['message/delete','id'=>$m->id])?>">حذف پیام</a>
                </div>

            </div>

    <?php
            $m->visit=1;
            $m->save();
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
