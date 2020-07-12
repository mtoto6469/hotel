<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use moonland\tinymce\TinyMCE;
?>
<div class="container" style="padding:2% 7%">
<div class="tbhotel-form" style="text-align: right !important;" dir="rtl">
    <br>
    <br>

    <?php
    if(isset($_SESSION['error'])){
        if($_SESSION['error']!=null){
            echo '<div class="alert alert-warning">'.$_SESSION['error'].'</div>';
        }$_SESSION['error']=null;
    }
    ?>
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'file')->fileInput()->label('لگو')->hint('برای گذاشت عکس  هتل روی لگو کلید کنید') ?>

    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->logo_hotel?>" alt="your image" style="width:100%;height: 200px">

    <?php  }else{
        echo '<img id="blah" src="#" alt="" style="width:100%;height: 200px">';

    }





    ?>

    <?= $form->field($model, 'name_hotel')->textInput() ?>

    <?= $form->field($model, 'name_hotel_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_manager_hotel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_hotel')->textarea() ?>

    <?= $form->field($model, 'addrerss_hotel_en')->textarea()?>


    <?= $form->field($model, 'status_star')->dropDownList(['apartment'=>'هتل آپارتمان','1star'=>'1ستاره','2star'=>'2ستاره','3star'=>'3ستاره','4star'=>'4ستاره','5star'=>'5ستاره'])?>



    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


 
    <?= $form->field($model, 'mobile_manager')->textInput() ?>


    <?= $form->field($model, 'general_information')->widget(TinyMCE::className());?>

    <?= $form->field($model, 'general_information_en')->widget(TinyMCE::className()) ?>

    <?= $form->field($model, 'space')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'space_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'roles')->widget(TinyMCE::className()) ?>

    <?= $form->field($model, 'roles_en')->widget(TinyMCE::className()) ?>

    <div id="map" style="width:400px;height:400px;background:yellow"></div>

    <?= $form->field($model, 'map_x')->hiddenInput()?>

    <?= $form->field($model, 'map_y')->hiddenInput()->label('')?>

    <br>
    <?= $form->field($model, 'time_end')->dropDownList(['1'=>'1ساله','2'=>'2ساله','3'=>'3ساله']) ?>
    <br>
    <br>
    <span style="color: red">کد مدیریت </span><br>
    <?php
    if($model->isNewRecord){
        echo '<span>'.$cod_manager.'</span>';
   echo $form->field($model, 'cod_manager')->hiddenInput(['value'=>$cod_manager])->label('');
    }else{
        $cod_manager=explode('-',$model->cod_manager);
        echo '<span>'.$cod_manager[2].'</span>';
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>





</div>
</div>
<script>

    var lat = new Array();
    var lng = new Array();

    var i=0;
    //    var element = document.getElementById(hid);

    function initMap() {

        var myLatlng = {lat: 35.6811434, lng: 51.3781643};

        var map = new google.maps.Map(document.getElementById('map'), {

            zoom: 10,
            center: myLatlng
        });

//        var marker = new google.maps.Marker({
//            position: myLatlng,
//            map: map,
//            title: 'Click to zoom'
//        });

//        map.addListener('center_changed', function() {
//            // 3 seconds after the center of the map has changed, pan back to the
//            // marker.
//            window.setTimeout(function() {
//                map.panTo(marker.getPosition());
//            }, 3000);
//        });

//        marker.addListener('click', function() {
//            map.setZoom(8);
//            map.setCenter(marker.getPosition());
//        });

        map.addListener('click', function(e) {

            alert(e.latLng.lat().toFixed(7)+"-"+e.latLng.lng().toFixed(7)+"i = " + i) ;

            lat[i]=e.latLng.lat().toFixed(8);
            lng[i]=e.latLng.lng().toFixed(8);
            i++;
            var mlat=new  google.maps.LatLng(e.latLng.lat() ,e.latLng.lng() );
            var marker2 = new google.maps.Marker({
                position: mlat,
                map: map,
                title: 'Click '
            });
            $("#tbhotel-map_x").val(lat);
            $("#tbhotel-map_y").val(lng);
//            map.setZoom(8);
//            map.setCenter(marker.getPosition());
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnR7drWTU4NJp6BU_XiF2uFun8xuOfcsg&&callback=initMap&libraries=geometry"></script>
