<?php
namespace backend\models;

use common\components\jdf;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\debug\models\search\Profile;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm2 extends Model
{
    public $username;
    public $password;
    public  $id;
    public  $id_hotel;
    public  $name;
    public  $lastname;
    public  $mobile;
    public  $rome_number;
    public  $count_peapel;
    public  $img;
    public  $date_enter;
    public  $date_exit;
    public  $cod_manager;
    public  $role;
    public  $date_enter_id;
    public  $date_exit_ir;
    public $file;
    public $phase;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'این نام  کاربری وجود دارد مجددا تلاش کنید.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

//
//            [['username', 'name'],
//                'unique',
//                'targetAttribute' => ['username', 'name']],
//            ['email', 'trim'],
////            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['role', 'required'],
            ['role', 'string'],

            [[ 'name', 'lastname', 'mobile', 'role'], 'required'],
            [['id_hotel', 'count_peapel', 'cod_manager'], 'integer'],
            [['date_enter', 'date_exit'], 'safe'],
            [['name', 'lastname', 'mobile', 'rome_number', 'img', 'role', 'date_enter_id', 'date_exit_ir', 'phase'], 'string', 'max' => 300],
            ['file','file']
        ];


    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hotel' => 'نام هتل',
            'name' => 'نام',
            'username' => 'نام کاربری',
            'password' =>'رمز عبور',
            'lastname' => 'نام خانوادگی',
            'mobile' => 'شماره تماس',
            'rome_number' => 'شماره اتاق',
            'count_peapel' => 'تعداد افراد',
            'img' => 'عکس پروفایل',
            'date_enter' => 'تاریخ ورود',
            'date_exit' => 'تاریخ خروج',
            'cod_manager' => 'کد مدیریت',
            'role' => 'نقش',
            'date_enter_id' => 'تاریخ ورود',
            'date_exit_ir' => 'تاریخ خروج',
            'phase' => 'فاز',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $sesssion = yii::$app->session;

        if (!$sesssion->isActive) {

            $sesssion->open();

        }
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole($this->role);
    
        if($user->save()) {
            $model=new Tblprofile();
            $auth->assign($authorRole, $user->id);


                    $model->cod_manager=$this->password;
                    $model->id_user=$user->id;
                    $model->id_hotel=$id;
                    $model->username=$user->username;
                    $model->name=$y=$this->name;
                    $model->lastname=$this->lastname;
                    $model->mobile=$this->mobile;
                    $model->role=$this->role;
                    if($model->save()){
                        return $user;
                    }else{

                        $_SESSION['resultSign']='در ذخیره اطلاعات مشکلی پیش آمده است';
                        $user->delete();
                        
                        return null;
                    }
               
          
        
        }else{

            return null;
        }


     
        
    }
}
