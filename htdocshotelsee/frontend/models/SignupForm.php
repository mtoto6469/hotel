<?php
namespace frontend\models;

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
        $authorRole = $auth->getRole($this->role);
    
        if($user->save()) {
            $model=new Tblprofile();
            $auth->assign($authorRole, $user->id);


            if ($this->file!=null) {

                $this->file->saveAs(Yii::getAlias('@upload') . '/upload/' . $this->file->baseName . '.' . $this->file->extension);
                $model->img = $this->file->baseName . '.' . $this->file->extension;

            }
            if($this->role=='manager'){
                $hotel=Tbhotel::findOne($_SESSION['id_hotel']);
                $code='1-'.$_SESSION['id_hotel'].'-'.$this->cod_manager;
                if($code!=$hotel->cod_manager ){

                    $_SESSION['resultSign']='کد ارسالی درست نمی باشد ';
                    $user->delete();
                    return null;
//   role=manager             برگردد به همون صفحه ای که ازش اومده
                }else{

                    $model->cod_manager=$code;
                    $model->id_user=$user->id;
                    $model->id_hotel=$hotel->id;

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
                }
            }
            else{

                if($this->date_enter_id!=null && $this->date_exit_ir!=null && $this->count_peapel!=null && $this->rome_number!=null){
                    $code='0-'.$_SESSION['id_hotel'].'-'.$this->cod_manager;
                    $checkCod=Tblcod::find()->where(['code'=>$code])->andWhere(['enable'=>1])->one();
                    if($checkCod==null){
                        $_SESSION['resultSign']='   کد ارسالی درست نمی باشد یا قبلا استفاده شده است';
                        $user->delete();
                        return null;

                    }else{
                        $checkCod->enable=0;
                        $checkCod->save();
                        $model->cod_manager=$code;
                    }

                    $model->id_user=$user->id;
                    $model->id_hotel=$_SESSION['id_hotel'];

                    $date_ir = new jdf();
                    $time = explode("/", $this->date_enter_id);
                    $d = $time[0];
                    $m = $time[1];
                    $y = $time[2];
                    $time2 = $date_ir->jalaliToGregorian($y, $m, $d);

                    $Y = $time2[0] . '/';
                    $M = $time2[1] . '/';
                    $D = $time2[2];
                    $g = $Y . $M . $D;


                    $model->date_enter=date($g);
                    $time = explode("/",$this->date_exit_ir);
                    $d = $time[0];
                    $m = $time[1];
                    $y = $time[2];
                    $time2 = $date_ir->jalaliToGregorian($y, $m, $d);

                    $Y = $time2[0] . '/';
                    $M = $time2[1] . '/';
                    $D = $time2[2];
                    $gg = $Y . $M . $D;
                    $model->date_exit=date($gg);
                    $model->username=$user->username;
                    $model->name=$y=$this->name;
                    $model->lastname=$this->lastname;
                    $model->mobile=$this->mobile;
                    $model->phase=$this->phase;
                    $room=Tblroom::find()->where(['id_hotel'=>$model->id_hotel])->andWhere(['number'=>$this->rome_number])->andWhere(['name'=>$this->phase])->andWhere(['fill'=>0])->one();
//                    var_dump($room);exit;
                    if($room==null){
                        $checkCod->enable=1;
                        $checkCod->save();
                        $_SESSION['resultSign']= '    در ذخیره اطلاعات مشکلی پیش آمده است اتاق هایی که انتخاب کردید در این فاز وجود ندارد یا پر است';
                        $user->delete();
                        return null;
                    }
                    $model->rome_number=' '.$this->rome_number;
                    $model->role=$this->role;
                    $model->count_peapel=$this->count_peapel;
                    $model->date_exit_ir=$this->date_exit_ir;
                    $model->date_enter_id=$this->date_enter_id;

                    if($model->save()){

                        $room->fill=1;
                        if($room->save()){



//                            ذخیره اطلاعات کاربران
                            $savepeaple=new Tblsavepeaple();
                            $savepeaple->id_hotel=$model->id_hotel;
                            $savepeaple->name=$model->name.' '.$model->lastname;
                            $savepeaple->tell=$model->mobile;
                            $savepeaple->date_enter=$model->date_enter;
                            $savepeaple->date_enter_ir=$model->date_enter_id;
                            $savepeaple->date_exit=$model->date_exit;
                            $savepeaple->date_exit_ir=$model->date_exit_ir;
                            $hotelsave=Tbhotel::findOne($model->id_hotel);
                            if($hotelsave!=null){
                                $savepeaple->namehotel=$hotelsave->name_hotel;
                            }else{
                                $savepeaple->namehotel="void";
                            }
                            $savepeaple->save();

                            //                            ذخیره اطلاعات کاربران
                            $khadamat=Tblkhadamat::find()->where(['id_hotel'=>$model->id_hotel])->andFilterWhere(['!=','mobile',0])->andWhere(['sms_notification'=>1])->all();
                            if($khadamat!=null){
                                $phone='';
                                foreach ($khadamat as $kh){
                                    $phone.=$kh->mobile.',';
                                }


                                if($this->phase!='none'){
                                    $phase=' ';
                                }else{
                                    $phase=' فاز '.' '.$this->phase;
                                }


                                $Webservice = 'Login.vonmedia.ir/webservice/server';
                                $param = array
                                (
                                    'Action'=>'Send',
                                    'username'=>'9170509996',
                                    'password'=>'2452319120',
                                    'type'=>1,
                                    'from'=>'985000988',
                                    'text'=>'مسافر '.' '. $model->name.' '.$model->lastname. 'مورخ '. ' '.$model->date_enter_id
                                        .'وارد هتل شد و در اتاق '.$model->rome_number.' '.$phase.' '. 'ساکن شد'.'  '.' شماره تماس مسافر :'.$this->mobile,
                                    'receivers'=>$phone,
                                    'file'=>0
                                );
                                $handler = curl_init($Webservice);
                                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                                curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
                                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                                $Response = json_decode(curl_exec($handler));
                                $ResponseCode = $Response->Result;
//                            if($ResponseCode==1){
//                                echo "Your SendID : ".$Response->SendID;
//                            } else {
//                                echo "Error : $ResponseCode";
//                            }
                            }


                            return $user;
                        }else{
                            $checkCod->enable=1;
                            $checkCod->save();
                            $model->delete();
                            $_SESSION['resultSign']='3در ذخیره اطلاعات مشکلی پیش آمده است';
                            $user->delete();
                            return null;
                        }

                    }else{

                        $checkCod->enable=1;
                        $checkCod->save();
                        $_SESSION['resultSign']='4در ذخیره اطلاعات مشکلی پیش آمده است';
                        $user->delete();

                        return null;
                    }
                }else{

                    $_SESSION['resultSign']=' اطلاعات ارسالی درست نمی باشد';
                    $user->delete();
                    return null;

                }

            }
        }else{

            return null;
        }


     
        
    }
}
