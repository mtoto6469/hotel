<?php
$url=Yii::$app->urlManager;

?>

<div class="report">

<!--    --><?php
//    if($hotel==null){
//        echo '<div class="alert alert-danger" style="text-align: right">اجازه دسترسی برای شما وجود ندارد ابتدا در یک هتل ثبت نام کنید</div>';
//    }else{
//        ?>

        <div class="container">
            <div class="panel panel-default">
                <table class="table table-hover" dir="rtl" style="text-align: right">
                    <tbody>
                    <tr>
                        <td>
                            <span>تعداد اتاق های خالی</span>

                        </td>
                        <td class="text-right text-nowrap" style="float: left">
                            <?php
                            if($empty!=null){
                                echo '<i>'.$empty.'</i>';
                            }else{
                                echo 'اتاقی برای هتل شما ذخیره نشده است';
                            }
                            ?>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <table class="table table-hover" dir="rtl" style="text-align: right">
                    <tbody>
                    <tr>
                        <td>
                            <span>تعداد اتاق های پر</span>

                        </td>
                        <td class="text-right text-nowrap" style="float: left">

                            <?php
                            if($fill!=null){
                                echo '<i>'.$fill.'</i>';
                                echo '         
                            <a href="'.$url->createAbsoluteUrl(['site/fill','hotel'=>$hotel]).'">
                                نمایش
                            </a>';
                            }else{
                                echo 'اتاقی برای هتل شما ذخیره نشده است';
                            }
                            ?>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <div class="panel panel-default">
                <table class="table table-hover" dir="rtl" style="text-align: right">
                    <tbody>
                    <tr>
                        <td>
                            <span>لیست مشتریان روز</span>

                        </td>
                        <td class="text-right text-nowrap" style="float: left">

                            <i><?=$list?></i>
                            <a href="<?=$url->createAbsoluteUrl(['site/list','hotel'=>$hotel])?>">
                                نمایش
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <div class="panel panel-default">
                <table class="table table-hover" dir="rtl" style="text-align: right">
                    <tbody>
                    <tr>
                        <td>
                            <span>پیام های جدید</span>

                        </td>
                        <td class="text-right text-nowrap" style="float: left">
                            <i><?=$newmessage?></i>
                            <a href="<?=$url->createAbsoluteUrl(['site/message','hotel'=>$hotel])?>">
                                نمایش
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <div class="panel panel-default">
                <table class="table table-hover" dir="rtl" style="text-align: right">
                    <tbody>
                    <tr>
                        <td>
                            <span>پیام های قدیمی</span>

                        </td>
                        <td class="text-right text-nowrap" style="float: left">
                            <i><?=$oldmessage?></i>
                            <a href="<?=$url->createAbsoluteUrl(['site/oldmessage','hotel'=>$hotel])?>">
                                نمایش
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
<!--    --><?php
//    }
//    ?>

    <a class="back" href="<?=$url->createAbsoluteUrl(['site/index'])?>">بازگشت به صفحه اصلی</a>

</div>
