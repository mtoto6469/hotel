<?php
$url=Yii::$app->urlManager;
?>
<?php
if($khadamat!=null){
    ?>
    <div  style="text-align: right;padding: 10px">
        <?php
        if ($tabliq != null) {
            $i=0;
            ?>
            <div class='row'>

                <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel8">


                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner">

                        <!-- Quote 1 -->

                        <?php
                        foreach ($tabliq as $t) {
                            if($i==0){?>
                                <div class="item active">

                                    <div class="text-center sliders ">
                                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $t->img ?>" alt="<?=$t->title?>">

                                        <small><?= $t->title ?></small>
                                    </div>
                                </div>
                                <?php
                            }else{
                                $ex=explode('.',$t->img);
                                ?>
                                <div class="item">

                                    <div class=" text-center sliders">
                                        <?php
                                        if($ex[1]=="mp4"){?>
                                            <video controls style="width: 100%;height: 150px">
                                                <source src="<?=Yii::$app->request->hostInfo?>/upload/<?=$t->img?>" type="video/mp4">
                                            </video>
                                            <?php
                                        }else{?>
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $t->img ?>" alt="<?=$t->title?>">
                                            <?php
                                        }
                                        ?>


                                        <small><?= $t->title ?></small>
                                    </div>

                                </div>

                            <?php }
                            $i++;
                        }
                        ?>

                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel8" class="left carousel-control lefta" style="background: none!important;">
                        <i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel8" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                        <i class="fa fa-chevron-right"></i></a>
                </div>

            </div>

            <?php
        }
        ?>



        <?php

if($des!=null){
    ?>

    <div class="notification-text" style="background: none;box-shadow: none;" >
        <div class="d" style="display: inline-block" dir="rtl">
            <?php
            foreach ($des as $d){
            ?>
            <a href="<?=$url->createAbsoluteUrl(['site/despost','id'=>$d->id])?>"> <div class="log1">
                    <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$d->logo?>" alt="<?=$d->title?>"><br><br>
                    <span><?=$d->title?></span>
                </div></a>
                <?php
            }
            ?>

        </div>



    </div>
        <?php
}
?>



        <?php
        if($khadamat->khadamat!=null) {
        ?>
        <div class="notification-text" dir="rtl">
            <h4 >خدمات</h4>
            <?=$khadamat->khadamat?>
        </div>


            <?php
        }
        ?>

        <?php
        if($khadamat->roles!=null) {
            ?>
            <div class="notification-text" dir="rtl">
            <h4 > قوانین</h4 >
            <?=$khadamat->roles?>
            </div>
            <?php
}
?>
        <?php
        if($sans!=null){
            ?>

            <div class="tbl">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">خدمات</th>
                        <th scope="col">سانس </th>
                        <th scope="col">روز</th>
                        <th scope="col">ساعات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($sans as $s){
                        ?>
                        <tr>
                            <td  style="word-break: break-all"><?=$s->descrition?></td>
                            <td><?=$s->women_men?></td>
                            <td><?=$s->day_of_weeken?></td>
                            <td><?=$s->time?></td>
                        </tr>
                    <?php
                    }
                    ?>



                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>


<?php
if($khadamat->img_menu!=null){
    $imgs=explode('#*',$khadamat->img_menu);

    ?>

        <div class="w3-content" style="max-width:800px">
            <?php

    for ($i=0;$i<count($imgs)-1;$i++){?>
        <img class="mySlides" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$imgs[$i]?>" style="width:100%">
<?php
    }?>
        </div>


    <div class="w3-center">
        <div class="w3-section">
            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ قبلی</button>
            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">بعدی ❯</button>
        </div>
        <?php

        for ($i=0;$i<count($imgs)-1;$i++){?>
            <button class="w3-button demo" onclick="currentDiv(<?=$i?>)"><?=$i?></button>
            <?php
        }?>
    </div>

<?php
}
?>








        <div class="notification-text">
            <h4>مکان</h4>
            <?=$khadamat->location?>
        </div>
    </div>
<?php
}else{
    echo '<div class="alert alert-warning">در حال حاضر اطلاعاتی در دست نیست</div>';

}
?>


