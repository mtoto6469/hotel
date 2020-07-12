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
class SignupForm extends Model
{
    public $username;
    public $password;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'این نام  کاربری وجود دارد مجددا تلاش کنید.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],


        ];


    }


    public function attributeLabels()
    {
        return [

            'username' => 'نام کاربری',
            'password' =>'رمز عبور',

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
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
        $authorRole = $auth->getRole('admin');

        if($user->save()) {
            $auth->assign($authorRole, $user->getId());
            return $user;
        }else{

            return null;
        }


     
        
    }
}
