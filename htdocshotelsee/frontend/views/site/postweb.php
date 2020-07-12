<?php
?>
<div class="body2" style="height: 100%">
    <div class="top-title">
        
    </div>
    <div class="white" >

        <?php
        if($post!=null){

                ?>
                <div class="f" dir="rtl">
                    <h3><?=$post->title?></h3>
                    <p><?=$post->text?></p>
                </div>

                <?php

if($id==2){
echo '<a href="https://new.sibapp.com/applications/hotelsee"><img
 src="https://new.sibapp.com/files/Sibapp-Download-Icons/dl-eng.png"
 alt="سیپ اپ" style="width:40%;float:right"></a>

';
}

        }else{
            ?>
            <div class="alert alert-danger">اطلاعات ارسالی درست نمی باشد مجددا تلاش کنید</div>
        <?php
        }
        ?>

    </div>
<!--    <div class="white" style="background: white;height: 200px"></div>-->
  
</div>
