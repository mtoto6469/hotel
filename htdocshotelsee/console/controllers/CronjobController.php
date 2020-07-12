<?php

namespace console\controller;


use yii\console\Controller;
use common\models\User;
use frontend\models\Tblprofile;
use frontend\models\Tblroom;
class CronjobController extends Controller
{
    function actionStart(){
//        $date=date('Y/m/d');
//        $allpro=Tblprofile::find()->where(['role'=>'user'])->andWhere(['date_exit'=>$date])->all();
//        if($allpro!=null){
//            foreach ($allpro as $ap){
//                $check=Tblroom::find()->where(['id_hotel'=>$ap->id_hotel])->andWhere(['number'=>$ap->rome_number])->andWhere(['name'=>$ap->phase])->count();
//                if($check==1){
//                    $room=Tblroom::find()->where(['id_hotel'=>$ap->id_hotel])->andWhere(['number'=>$ap->rome_number])->andWhere(['name'=>$ap->phase])->one();
//                    $room->fill=0;
//                    $room->save();
//                }
//                $user=User::findOne($ap->id_user);
//                if($user!=null){
//                    $user->delete();
//                    $ap->delete();
//                }
//
//            }
//        }



        $rome=new Tblroom();
        $rome->id_hotel=999;
        $rome->number=2;
        $rome->fill=1;
        $rome->name="w";
        $rome->save();
    }

}