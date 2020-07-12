<?php
/**
 * Created by PhpStorm.
 * User: halesh
 * Date: 7/24/2018
 * Time: 2:23 AM
 */

namespace frontend\controllers;
use common\models\User;
use frontend\models\Tblprofile;
use frontend\models\Tblroom;
use yii\web\Controller;

class CronController extends Controller
{

    public function actionIndex(){
        $date=date('Y-m-d');
        $allpro=Tblprofile::find()->where(['role'=>'user'])->andWhere(['date_exit'=>$date])->all();
        if($allpro!=null){
            foreach ($allpro as $ap){
                $check=Tblroom::find()->where(['id_hotel'=>$ap->id_hotel])->andWhere(['number'=>$ap->rome_number])->count();
                if($check==1){
                    $room=Tblroom::find()->where(['id_hotel'=>$ap->id_hotel])->andWhere(['number'=>$ap->rome_number])->one();
                    $room->fill=0;
                    $room->save();
                }
                $user=User::findOne($ap->id_user);
                if($user!=null){
                    $user->delete();
                    $ap->delete();
                }
               
            }
        }
    }

}