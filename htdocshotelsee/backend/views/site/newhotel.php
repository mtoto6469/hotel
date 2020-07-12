<?php
$url=Yii::$app->urlManager;
?>

<div class="hotel-one" >
    <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$hotel->logo_hotel?>">
<div class="des-hotel">

    <div class="top-des" >
        <h3 ><?=$hotel->name_hotel?><span><?=$hotel->name_hotel_en?></span></h3>
    </div>
    <div class="row">
        <div class="col-md-6" style="text-align: left">
            <p><span >tel:</span><?=$hotel->phone?></p>
            <p><span >tel:</span><?=$hotel->mobile_manager?></p>
        </div>
        <div class="col-md-6" style="text-align: right">
            <p><span >آدرس:</span><?=$hotel->address_hotel?></p>
        </div>

    </div>
    
</div>



</div>
<div class="other-hotel" style="text-align: right" dir="rtl">
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['hotel/update','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">ویرایش ، حذف</p>
                    <span class="card-title"> برای ویرایش اطلاعات هتل  از این قسمت وارد شوید</span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['hotel/view','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['room/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">اتاق های هتل</p>
                    <span class="card-title"> برای ویرایش تعداد های هتل  از این قسمت وارد شوید</span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['room/index','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">

                    <a href="<?=$url->createAbsoluteUrl(['cathotel/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">دسته بندی خدمات</p>
                    <span class="card-title"> اضافه حذف و ویرایش دسته بندی خدمات</span>
                </div>
                <div class="card-footer">
                    <a href="<?=$url->createAbsoluteUrl(['cathotel/index','id'=>$hotel->id])?>"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="#pablo">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['khadamat/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">store</i>
                        </div></a>
                    <p class="card-category"> خدمات</p>
                    <span class="card-title">اضافه ، ویرایش ، حذف خدمات هتل</span>
                </div>
                <div class="card-footer">
                    <a href="<?=$url->createAbsoluteUrl(['khadamat/index','id'=>$hotel->id])?>"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="#pablo">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['sans/index','id'=>$hotel->id])?>"> <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                </div></a>
                    <p class="card-category">زمان بندی خدمات هتل</p>
                    <span class="card-title"> اضافه ، ویرایش ویا حذف زمان بندی برای هر کدام از خد مات</span>
                </div>
                <div class="card-footer">
                    <a href="<?=$url->createAbsoluteUrl(['sans/index','id'=>$hotel->id])?>"> <div class="stats">
                        <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                        <a href="#pablo">برای دیدن کلیک کنید</a>
                    </div></a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['des/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">اطلاعات بیشتر برای خدمات</p>
                    <span class="card-title">اضافه ، ویرایش ویا حذف </span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['des/view','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">

                    <a href="<?=$url->createAbsoluteUrl(['gallery/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">گالری</p>
                    <span class="card-title">اضافه حذف و ویرایش عکس های مربوط به این هتل</span>
                </div>
                <div class="card-footer">
                    <a href="<?=$url->createAbsoluteUrl(['gallery/index','id'=>$hotel->id])?>"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="#pablo">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['link/index','id'=>$hotel->id])?>"><div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div></a>
                    <p class="card-category">تبلیغات</p>
                    <span class="card-title">ثبت تبلیغات ، ویرایش و حذف تبلیغات </span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['link/index','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['message/index','id'=>$hotel->id])?>"> <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div></a>
                    <p class="card-category">پیام</p>
                    <span class="card-title">انتقادات ، پیشنهادات مشتریان نسبت به این هتل</span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="#pablo">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['cod/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">ایجاد کد کاربر</p>
                    <span class="card-title"> میتوانید در این قسمت برای مشتریان این هتل کد صادر کنید</span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['cod/index','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['profile/index','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">مشتریان هتل</p>
                    <span class="card-title"> میتوانید در این قسمت لیست مشتریانی که در هتل هستند را ببینید</span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['profile/index','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>



        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <a href="<?=$url->createAbsoluteUrl(['profile/index2','id'=>$hotel->id])?>"><div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div></a>
                    <p class="card-category">کارمندان هتل</p>
                    <span class="card-title"> میتوانید در این قسمت لیست کارمندان که در هتل هستند را ببینیدو همینطور کارمند جدیدی را ثبت نام کنید</span>
                </div>
                <div class="card-footer">
                    <a href="#"> <div class="stats">
                            <i class="fa fa-hand-o-right " style="font-size: 16px"></i>
                            <a href="<?=$url->createAbsoluteUrl(['profile/index2','id'=>$hotel->id])?>">برای دیدن کلیک کنید</a>
                        </div></a>
                </div>
            </div>
        </div>
    </div>
</div>
