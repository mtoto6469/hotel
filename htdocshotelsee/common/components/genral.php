<?php



namespace common\components;



use common\models\User;
use frontend\models\AuthAssignment;
use frontend\models\Tblprofile;
use yii\db\Command;

class genral extends Command

{

    public function check($id_user){
        $user=User::findOne($id_user);
        if($user==null){
            return 0;
        }
            $item_role=AuthAssignment::findOne(['user_id'=>$id_user]);
            if($item_role==null){
                return 0;
            }
            $role=$item_role->item_name;
        if($role=='admin'){
            return -1;
        }elseif($role=='user'|| $role=='manager'|| $role=='employee'){
            $profile=Tblprofile::findOne(['id_user'=>$id_user]);
            if(!$profile==null){
               return $profile->id_hotel;
            }
            return 0;
        }
            
        
    }



}




