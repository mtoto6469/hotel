
<?php
if ($tabliq != null) {
    $i=0;
    ?>
    <div class='row'>

        <div class="carousel slide g-c" data-ride="carousel" id="quote-carousel5">


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
            <a data-slide="prev" href="#quote-carousel5" class="left carousel-control lefta" style="background: none!important;">
                <i class="fa fa-chevron-left"></i></a>
            <a data-slide="next" href="#quote-carousel5" class="right carousel-control righta" style="right: 10px !important;background: none!important;">
                <i class="fa fa-chevron-right"></i></a>
        </div>

    </div>

    <?php
}
?>
<div class="message" name="message" style="padding:5%">


    <?php
    use frontend\models\Tblmessage;
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    if(isset($_SESSION['suc-me'])){
        if($_SESSION['suc-me']!=null){
            echo '<h6 class="alert alert-warning war">'.$_SESSION['suc-me'].'</h6>';
        }$_SESSION['suc-me']=null;
    }
    ?>
    <h4 >انتقادات و پیشنهادات</h4>
    <?php
    $model = new Tblmessage();?>
    <?php $form = ActiveForm::begin(['action'=>['/message/create']]); ?>

    <?= $form->field($model, 'id_hotel')->hiddenInput(['value'=>0])->label(' ')  ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 6])->label(' ') ?>



    <div class="form-group">
        <?= Html::submitButton('ثبت انتقادات و پیشنهادات', ['class' => 'btn btn-default btn-green']) ?>
    </div>

    <?php ActiveForm::end(); ?>





</div>