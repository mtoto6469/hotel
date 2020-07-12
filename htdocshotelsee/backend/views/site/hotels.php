<?php
$url = Yii::$app->urlManager;
?>


<div class="hotel">

    <a class="btn-new" href="<?= $url->createAbsoluteUrl(['hotel/create']) ?>">
        <i class="fa fa-home"></i>
        ثبت هتل جدید</a>


    <div class="wrap-hotel">
        <div class="row" style="padding: 0!important;">

            <?php
            if ($hotel != null) {
                foreach ($hotel as $h) {
                    ?>
                    <div class="col-md-3" style="text-align: center">
                        <a href="<?= $url->createAbsoluteUrl(['site/newhotel', 'id' => $h->id]) ?>">
                            <div class="into-wrap">
                                <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $h->logo_hotel ?>">
                                <h2><?= $h->name_hotel ?></h2>
                                <h3><?= $h->name_hotel_en ?></h3>
                                <p>کد مدیریت</p>
                                <?php
                                $cod_manager=explode('-',$h->cod_manager);

                                ?>

                                <p class="blue"><?=$cod_manager[2]  ?></p>


                            </div>

                        </a>


                        <a href="<?= $url->createAbsoluteUrl(['hotel/delete', 'id' => $h->id]) ?>" class="del">حذف</a>
                       <a href="<?= $url->createAbsoluteUrl(['hotel/view', 'id' => $h->id]) ?>" class="upd">نمایش</a>
                    </div>
                    <?php

                }
            }
            ?>


        </div>


    </div>


</div>
