<?php
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
                if($pro==null){
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
           
        }
        
    }else{
        echo '<div class="alert alert-info" style="text-align:right">در حال حاضر این لیست خالی می باشد</div>';

    }
    ?>
    <a class="back" href="<?=$url->createAbsoluteUrl(['site/report'])?>">بازگشت</a>
</div>
