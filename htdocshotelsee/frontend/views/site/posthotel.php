<?php
?>
<div class="body2" style="height: 100%">

    <div class="white" dir="rtl">

        <?php
        if($title!=null){
           if ($title=='آدرس'){?>
               <h3> آدرس و شماره تماس</h3>
               <div class="f" dir="rtl">

                   <p><?=$hotel->address_hotel?></p>
               </div>
               <div class="f" dir="rtl">

                   <p><?=$hotel->addrerss_hotel_en?></p>
               </div>
               <div class="f">

                   <p><?=$hotel->phone?></p>
               </div>
              <?php
            }elseif ($title=='راهنما'){?>
               <h3>توضیحات</h3>
               <div class="f" dir="rtl">

                   <p><?=$hotel->general_information?></p>
               </div>
               <div class="f" dir="rtl">

                   <p><?=$hotel->general_information_en?></p>
               </div>
               <?php

            }elseif ($title=='قوانین'){?>
               <h3>قوانین</h3>
               <div class="f" dir="rtl">

                   <p><?=$hotel->roles?></p>
               </div>
               <div class="f" dir="rtl">

                   <p><?=$hotel->roles_en?></p>
               </div>
               <?php

            }elseif ($title=='فاصله'){?>
               <h3>فاصله تا مراکز اصلی شهر</h3>
               <div class="f" dir="rtl">

                   <p><?=$hotel->space?></p>
               </div>
               <div class="f" dir="rtl">

                   <p><?=$hotel->space_en?></p>
               </div>
               <?php

            }elseif ($title=='نقشه'){

               ?>
               <span id="x"><?=$hotel->map_x?></span>
               <span id="y"><?=$hotel->map_y?></span>
               <div id="map" style="width:100%;height:500px"></div>
               <?php
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


<script>
    function myMap() {
//        var x=$('#x').text();
//        var y=$('#y').text();
        var x='<?=$x?>';
        var y='<?=$y?>';
        var xx = parseFloat(x);
        var yy = parseFloat(y);
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng(xx,yy);
        var mapOptions = {center: myCenter, zoom: 5};
        var map = new google.maps.Map(mapCanvas,mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
            icon: "pinkball.png"
        });
        marker.setMap(map);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO8dgsGnmrNwq1eYChm9Y-qBqXqul1UDI&&callback=myMap&libraries=geometry"></script>

