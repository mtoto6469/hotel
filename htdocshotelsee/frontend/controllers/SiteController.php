<?php
namespace frontend\controllers;

use common\components\genral;
use frontend\models\Tbhotel;
use frontend\models\Tblcathotel;
use frontend\models\Tblcatpost;
use frontend\models\Tbllink;
use frontend\models\Tblpost;
use common\models\User;
use frontend\models\AuthAssignment;
use frontend\models\Tbldes;
use frontend\models\Tblgallery;
use frontend\models\Tblkhadamat;
use frontend\models\Tblmessage;
use frontend\models\Tblprofile;
use frontend\models\Tblroom;
use frontend\models\Tblsans;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */


    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup','contact','hotels','hotel','index','report','gallery','list','oldmessage'
//                ,'cat','post','postweb','search','hotelpost','khadamat','onekhadamat','despost'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
////                    [
////                        'actions' => ['logout','hotel','report','list','oldmessage'
////                       ,'postweb','hotelpost','khadamat','onekhadamat','despost'],
////                        'allow' => true,
////                        'roles' => ['@'],
////                    ],
//
////                    [
////                        'actions' => ['index' ,'cat','post','hotels','search','contact','gallery'],
////                        'allow' => true,
////                        'roles' => ['?'],
////                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'index'])->all();
        return $this->render('index', ['tabliq' => $tabliq,]);
    }

    public function actionError2()
    {
        return $this->render('error2');
    }

 public function actionError3()
    {
              $date=date('Y/m/d');
        $allpro=Tblprofile::find()->where(['role'=>'user'])->andWhere(['date_exit'=>$date])->all();
        if($allpro!=null){
            foreach ($allpro as $ap){
                $check=Tblroom::find()->where(['id_hotel'=>$ap->id_hotel])->andWhere(['number'=>$ap->rome_number])->andWhere(['name'=>$ap->phase])->count();
                if($check==1){
                    $room=Tblroom::find()->where(['id_hotel'=>$ap->id_hotel])->andWhere(['number'=>$ap->rome_number])->andWhere(['name'=>$ap->phase])->one();
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
    public function actionGallery()
    {


        if (Yii::$app->request->get()) {
            $hotel = $_GET['hotel'];
            if ($hotel != null) {
                $tabliq = Tbllink::find()->where(['id_hotel' => $hotel])->all();
                $gallery = Tblgallery::find()->where(['id_hotel' => $hotel])->andWhere(['enabel' =>1])->all();
                return $this->render('gallery', [
                    'gallery' => $gallery,
                    'tabliq' => $tabliq,
                ]);
            } else {
                $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'hotel'])->all();
                $gallery = Tblgallery::find()->where(['id_hotel' => 0])->andWhere(['enabel' =>1])->all();
                return $this->render('gallery', [
                    'gallery' => $gallery,
                    'tabliq' => $tabliq,
                ]);
            }

        } else {
            $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'hotel'])->all();
            $gallery = Tblgallery::find()->where(['id_hotel' => 0])->andWhere(['enabel'=>1])->all();
            return $this->render('gallery', [
                'gallery' => $gallery,
                'tabliq' => $tabliq,
            ]);
        }

    }
    
    

    public function actionReport()
    {

//        $pro=\backend\models\Tblprofile::findOne($);

        if (!Yii::$app->user->isGuest) {

            $role = \frontend\models\AuthAssignment::findOne(['user_id' => Yii::$app->user->getId()]);
            if ($role->item_name == 'manager') {
                $list = 0;
                $fill = 0;
                $empty = 0;
                $newmessage=0;
                $oldmessage=0;
                $hotel = Tblprofile::findOne(['id_user' => Yii::$app->user->getId()]);

                if ($hotel != null) {

                    $list = Tblprofile::find()->where(['id_hotel' => $hotel->id_hotel])->andWhere(['date_enter' => date('Y/m/d')])->andWhere(['role' => 'user'])->count();
//                    $h = \frontend\models\Tbhotel::findOne($hotel->id_hotel);
                    $romm = Tblroom::find()->where(['id_hotel' => $hotel->id_hotel])->all();
                    if ($romm != null) {
                        $empty = Tblroom::find()->where(['id_hotel' => $hotel->id_hotel])->andFilterWhere(['fill' => 0])->count();
                                        $fill = Tblroom::find()->where(['id_hotel' => $hotel->id_hotel])->andWhere(['fill' => 1])->count();
                    //    $fill = Tblprofile::find()->where(['id_hotel' => $hotel])->andFilterWhere(['>=', 'date_exit', date('Y/m/d')])->andWhere(['role' => 'user'])->count();

                    } else {
                        $empty = null;
                        $fill = null;
                    }

                    $newmessage = Tblmessage::find()->where(['id_hotel' => $hotel->id_hotel])->andWhere(['visit' => 0])->count();
                    $oldmessage = Tblmessage::find()->where(['id_hotel' => $hotel->id_hotel])->andWhere(['visit' => 1])->count();
                }
                return $this->render('report', [
                    'hotel' => $hotel->id_hotel,
                    'list' => $list,
                    'fill' => $fill,
                    'empty' => $empty,
                    'newmessage' => $newmessage,
                    'oldmessage' => $oldmessage,
                ]);

            } elseif($role->item_name == 'admin') {

                if (Yii::$app->request->get()) {
                    $id_hotel = $_GET['id_hotel'];
                    if ($id_hotel != null) {
                        $list = 0;
                        $fill = 0;
                        $empty = 0;
                        $newmessage=0;
                        $oldmessage=0;




                            $list = Tblprofile::find()->where(['id_hotel' => $id_hotel])->andWhere(['date_enter' => date('Y/m/d')])->andWhere(['role' => 'user'])->count();

                            $romm = Tblroom::find()->where(['id_hotel' => $id_hotel])->all();
                            if ($romm != null) {
                                $empty = Tblroom::find()->where(['id_hotel' => $id_hotel])->andFilterWhere(['fill' => 0])->count();
                                              $fill = Tblroom::find()->where(['id_hotel' => $id_hotel])->andWhere(['fill' => 1])->count();
                               // $fill = Tblprofile::find()->where(['id_hotel' => $id_hotel])->andFilterWhere(['>=', 'date_exit', date('Y/m/d')])->andWhere(['role' => 'user'])->count();

                            } else {
                                $empty = null;
                                $fill = null;
                            }

                            $newmessage = Tblmessage::find()->where(['id_hotel' => $id_hotel])->andWhere(['visit' => 0])->count();
                            $oldmessage = Tblmessage::find()->where(['id_hotel' => $id_hotel])->andWhere(['visit' => 1])->count();

                        return $this->render('report', [
                            'hotel' => $id_hotel,
                            'list' => $list,
                            'fill' => $fill,
                            'empty' => $empty,
                            'newmessage' => $newmessage,
                            'oldmessage' => $oldmessage,
                        ]);

                    }
                    return $this->redirect(['index']);
                }
                return $this->redirect(['index']);
            } else {
                return $this->redirect(['index']);
            }
        } else {
            $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

            return $this->redirect(['site/error2']);
        }


    }

  


    public function actionList()
    {
        if (Yii::$app->request->get()) {
            $hotel = $_GET['hotel'];
            if ($hotel != null) {
//                $g = new genral();
//                $check_user = $g->check(Yii::$app->user->getId());
//                if($check_user==$hotel){
                    $list = Tblprofile::find()->where(['id_hotel' => $hotel])->andWhere(['date_enter' => date('Y/m/d')])->andWhere(['role' => 'user'])->all();
                    return $this->render('list', ['list' => $list,'id_hotel'=>$hotel]);
//                }else{
//                    $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';
//
//                    return $this->redirect(['site/error2']);
//                }
               
            }
            return $this->redirect(['report']);
        }
        return $this->redirect(['report']);
    }


    public function actionFill()
    {
        if (Yii::$app->request->get()) {
            $hotel = $_GET['hotel'];
            if ($hotel != null) {
//                $g = new genral();
//                $check_user = $g->check(Yii::$app->user->getId());
//                if($check_user==$hotel) {
                    $fill = Tblprofile::find()->where(['id_hotel' => $hotel])->andFilterWhere(['>=', 'date_exit', date('Y/m/d')])->andWhere(['role' => 'user'])->all();
                    return $this->render('list', ['list' => $fill,'id_hotel'=>$hotel]);
//                }else{
//                    $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';
//
//                    return $this->redirect(['site/error2']);
//                }
            }
            return $this->redirect(['report']);
        }
        return $this->redirect(['report']);
    }


    public function actionSend()
    {
        return $this->render('send');
    }
    
    

    public function actionMessage()
    {
        if (Yii::$app->request->get()) {
            $hotel = $_GET['hotel'];
            if ($hotel != null) {

                $message = Tblmessage::find()->where(['id_hotel' => $hotel])->andWhere(['visit' => 0])->all();

                return $this->render('message', ['message' => $message,'id_hotel'=>$hotel]);
            }
            return $this->redirect(['report']);
        }
        return $this->redirect(['report']);
    }


    public function actionOldmessage()
    {
        if (Yii::$app->request->get()) {
            $hotel = $_GET['hotel'];
            if ($hotel != null) {

                $message = Tblmessage::find()->where(['id_hotel' => $hotel])->andWhere(['visit' => 1])->all();

                return $this->render('message', ['message' => $message,'id_hotel'=>$hotel]);
            }
            return $this->redirect(['report']);
        }
        return $this->redirect(['report']);
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $role = AuthAssignment::findOne(['user_id' => Yii::$app->user->getId()]);
            $sesssion = yii::$app->session;

            if (!$sesssion->isActive) {

                $sesssion->open();

            }
            if ($role->item_name == 'manager') {
                $_SESSION['role'] = 'manager';

            } else {
                $_SESSION['role'] = 'user';
            }

            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {
        $sesssion = yii::$app->session;

        if (!$sesssion->isActive) {

            $sesssion->open();


        }

        Yii::$app->user->logout();

        return $this->goBack();
    }

    public function actionCat($id)
    {
        $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'index'])->all();
        $cat = Tblcatpost::find()->where(['enable' => 1])->andWhere(['id_parent' => $id])->all();
        $post = Tblpost::find()->where(['enable' => 1])->andWhere(['id_cat' => $id])->all();
        return $this->render('cat', [
            'cat' => $cat,
            'post' => $post,
            'tabliq' => $tabliq,
        ]);
    }

    public function actionHotels()
    {
        $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'hotel'])->all();
        $hotels = Tbhotel::find()->all();
        return $this->render('hotels', [
            'hotels' => $hotels,
            'tabliq' => $tabliq,
        ]);
    }


    public function actionPost()
    {

        if (Yii::$app->request->get()) {
            $id = $_GET['id'];
            if ($id != null) {
                $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'index'])->all();
                $cat = Tblcatpost::findOne($id);
                $post = Tblpost::find()->where(['enable' => 1])->andWhere(['id_cat' => $id])->all();
                $logo = $cat->logo;
                return $this->render('post', [
                    'post' => $post,
                    'logo' => $logo,
                    'tabliq' => $tabliq,
                ]);

            }
            return $this->redirect(['site/index']);
        }

        return $this->redirect(['site/index']);


    }


    public function actionPostweb()
    {



            if (Yii::$app->request->get()) {
                $title = $_GET['title'];
                if ($title != null) {

                    $post = Tblpost::findOne($title);
                    return $this->render('postweb', [
                        'post' => $post,
'id'=>$title,
                    ]);
                }
                return $this->redirect(['site/index']);
            }
          
        $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

        return $this->redirect(['site/error2']);


    }


    public function actionDespost($id)
    {
        if (!Yii::$app->user->isGuest) {
            $g = new genral();
            $check_user = $g->check(Yii::$app->user->getId());


            $post = Tbldes::findOne($id);
            if ($check_user == -1) {
                return $this->render('postweb', [
                    'post' => $post,
'id'=>-1,
                ]);
            } elseif ($check_user == 0) {
                $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                return $this->redirect(['site/error2']);
            } else {
                if ($post != null) {
                    if ($post->id_hotel == $check_user) {
                        return $this->render('postweb', [
                            'post' => $post,
'id'=>-1,
                        ]);
                    }else{
                        $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                        return $this->redirect(['site/error2']);
                    }
                }
                return $this->render('postweb', [
                    'post' => $post,
'id'=>-1,
                ]);

            }


        }

    }

    public function actionSearch()
    {

        $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'hotel'])->all();
        $hotels = \frontend\models\Tbhotel::find()->filterWhere(['like', 'name_hotel', $_POST['name']])->all();
        return $this->render('hotels', [
            'hotels' => $hotels,
            'tabliq' => $tabliq,
        ]);
    }

    public function actionHotel()
    {
        $sesssion = yii::$app->session;
        if (!$sesssion->isActive) {
            $sesssion->open();
        }

        if (Yii::$app->request->get()) {
            $id = $_GET['id'];
            if ($id != null) {

                if (Yii::$app->user->isGuest) {

                    $_SESSION['id_hotel'] = $id;
                    return $this->redirect(['role']);
                } else {
                    $role = AuthAssignment::findOne(['user_id' => Yii::$app->user->getId()]);
                    if ($role->item_name == 'admin') {
                        $hotel = Tbhotel::findOne($id);
                        $tabliq = Tbllink::find()->where(['id_hotel' => $id])->orderBy(['id' => SORT_DESC])->all();

                        $khadamat = Tblcathotel::find()->where(['id_hotel' => $id])->orderBy([
                            'position' => SORT_DESC,
                        ])->all();

                        return $this->render('hotel', [
                            'hotel' => $hotel,
                            'tabliq' => $tabliq,
                            'id' => $id,
                            'khadamat' => $khadamat,
                        ]);
                    } else {
                        $profile = Tblprofile::findOne(['id_user' => Yii::$app->user->getId()]);
                        if ($profile == null) {

                            $_SESSION['errorHotel'] = 'اطلاعات شما  در دست نمی باشد لطفا  دوباره ثبت نام کنید';
                            Yii::$app->user->logout();
                            return $this->redirect(['hotels']);

                        } else {

                            if ($profile->id_hotel == $id) {

                                $hotel = Tbhotel::findOne($id);
                                $tabliq = Tbllink::find()->where(['id_hotel' => $id])->orderBy(['id' => SORT_DESC])->all();

                                $khadamat = Tblcathotel::find()->where(['id_hotel' => $id])->orderBy([
                                    'position' => SORT_DESC,
                                ])->all();

                                return $this->render('hotel', [
                                    'hotel' => $hotel,
                                    'tabliq' => $tabliq,
                                    'id' => $id,
                                    'khadamat' => $khadamat,
                                ]);
                            } else {
                                $_SESSION['errorHotel'] = 'شما اجازه دسترسی به این هتل را ندارید';
                                return $this->redirect(['hotels']);
                            }

                        }

                    }


                }
            }
            return $this->redirect(['hotels']);
        } else {
            return $this->redirect(['hotels']);
        }


    }


    public function actionHotelpost()
    {

        if (!Yii::$app->user->isGuest) {
            $g = new genral();
            $check_user = $g->check(Yii::$app->user->getId());

                if (Yii::$app->request->get()) {
                    $id = $_GET['hotel'];
                    $title = $_GET['title'];
                    if ($id != null && $title != null) {
                        $hotel = \frontend\models\Tbhotel::findOne($id);
                        if ($check_user == 0) {
                            $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                            return $this->redirect(['site/error2']);
                        }elseif($check_user==-1){
                            if ($hotel->map_x != null || $hotel->map_y != null) {
                                $x = $hotel->map_x;
                                $y = $hotel->map_y;
                            } else {
                                $x = null;
                                $y = null;

                            }
                            return $this->render('posthotel', [
                                'hotel' => $hotel,
                                'title' => $title,
                                'x' => $x,
                                'y' => $y,
                            ]);
                        }else{

                            if($id==$check_user){
                                if ($hotel->map_x != null || $hotel->map_y != null) {
                                    $x = $hotel->map_x;
                                    $y = $hotel->map_y;
                                } else {
                                    $x = null;
                                    $y = null;

                                }
                                return $this->render('posthotel', [
                                    'hotel' => $hotel,
                                    'title' => $title,
                                    'x' => $x,
                                    'y' => $y,
                                ]);
                            }else{
                                $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                                return $this->redirect(['site/error2']);
                            }

                        }


                    }
                    return $this->redirect(['hotels']);
                }
                return $this->redirect(['hotels']);


        }
        $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

        return $this->redirect(['site/error2']);
    }


    public function actionKhadamat()
    {

        if (!Yii::$app->user->isGuest) {
            $g = new genral();
            $check_user = $g->check(Yii::$app->user->getId());

                if (Yii::$app->request->get()) {
                    $id = $_GET['id'];
                    if ($id != null) {

                        $khadamat = Tblkhadamat::find()->where(['category' => $id])->all();
                        $cat = Tblcathotel::findOne($id);
                        if ($check_user == 0) {
                            $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                            return $this->redirect(['site/error2']);
                        }elseif($check_user==-1){
                            $tabliq = Tbllink::find()->where(['id_hotel' => $cat->id_hotel])->orderBy(['id' => SORT_DESC])->all();
                            return $this->render('khadamat', [
                                'khadamat' => $khadamat,
                                'tabliq' => $tabliq,

                            ]);
                        }else{
                            if($check_user==$cat->id_hotel){
                                $tabliq = Tbllink::find()->where(['id_hotel' => $cat->id_hotel])->orderBy(['id' => SORT_DESC])->all();
                                return $this->render('khadamat', [
                                    'khadamat' => $khadamat,
                                    'tabliq' => $tabliq,

                                ]);
                            }else{

                                $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                                return $this->redirect(['site/error2']);
                            }
                        }



                    }
                    return $this->redirect(['hotels']);
                }
                return $this->redirect(['hotels']);

        }
        $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

        return $this->redirect(['site/error2']);
    }


    public function actionOnekhadamat()
    {
        if (Yii::$app->request->get()) {
            $id = $_GET['id'];
            if ($id != null) {
                $sans = null;
                $tabliq = null;
                $des=null;
                $khadamat = Tblkhadamat::findOne($id);
                if ($khadamat != null) {

                    $g = new genral();
                    $check_user = $g->check(Yii::$app->user->getId());
                    if ($check_user == 0) {
                        $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                        return $this->redirect(['site/error2']);
                    }elseif($check_user==-1){
                        $sans = Tblsans::find()->where(['id_khadamat' => $khadamat->id])->all();
                        $des = Tbldes::find()->where(['id_khadamat' => $khadamat->id])->all();

                        $tabliq = Tbllink::find()->where(['id_hotel' => $khadamat->id_hotel])->orderBy(['id' => SORT_DESC])->all();

                    }else{
                        if($check_user==$khadamat->id_hotel){
                            $sans = Tblsans::find()->where(['id_khadamat' => $khadamat->id])->all();
                            $des = Tbldes::find()->where(['id_khadamat' => $khadamat->id])->all();

                            $tabliq = Tbllink::find()->where(['id_hotel' => $khadamat->id_hotel])->orderBy(['id' => SORT_DESC])->all();

                        }else{

                            $_SESSION['errorsite'] = 'شما اجازه دسترسی ندارید ';

                            return $this->redirect(['site/error2']);
                        }
                    }

                }
                return $this->render('onekhadamat', [
                    'khadamat' => $khadamat,
                    'sans' => $sans,
                    'des' => $des,
                    'tabliq' => $tabliq,
                ]);

            }
            return $this->redirect(['hotels']);
        }
        return $this->redirect(['hotels']);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $tabliq = Tbllink::find()->where(['id_hotel' => 0])->andWhere(['status' => 'index'])->all();
        return $this->render('contact', [
            'tabliq' => $tabliq,
        ]);

    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRole()
    {

        $sesssion = yii::$app->session;

        if (!$sesssion->isActive) {

            $sesssion->open();

        }

        if (Yii::$app->request->post()) {
            if (isset($_POST['btn']) && $_POST['btn'] != null) {
                if ($_POST['btn'] == 'm') {
                    $_SESSION['role'] = 'manager';
                    return $this->redirect(['signup']);
                } else {
                    $_SESSION['role'] = 'user';
                    return $this->redirect(['signup']);
                }
            }
        }
        return $this->render('role');


    }

    public function actionSignup()
    {

        if (isset($_SESSION['role']) && $_SESSION['role'] != null && isset($_SESSION['id_hotel']) && $_SESSION['id_hotel'] != null) {
            if ($_SESSION['role'] == 'user') {
                $role = 'user';
            } else {
                $role = 'manager';
            }
            $model = new SignupForm();
            $hotel = \frontend\models\Tbhotel::findOne($_SESSION['id_hotel']);
            if ($hotel != null) {
                $rooms = ArrayHelper::map(Tblroom::find()->where(['id_hotel' => $hotel->id])->andFilterWhere(['fill' => 0])->all(), 'number', 'number');
                if ($model->load(Yii::$app->request->post())) {

                    $model->file = UploadedFile::getInstance($model, 'file');
                    if ($user = $model->signup()) {
                        if (Yii::$app->getUser()->login($user)) {
                            $this->redirect(['site/hotel', 'id' => $hotel->id]);
                        }
                    }
                    return $this->render('signup', [
                        'model' => $model,
                        'role' => $role,
                        'image' => $hotel->logo_hotel,
                        'name' => $hotel->name_hotel,
                        'room' => $rooms,
                    ]);
                }

//            $role=['manager'=>'manager','user'=>'user'];
                return $this->render('signup', [
                    'model' => $model,
                    'role' => $role,
                    'image' => $hotel->logo_hotel,
                    'name' => $hotel->name_hotel,
                    'room' => $rooms,
                ]);
            } else {
                $_SESSION['result2'] = 'در ارسال اطلاعات مشکلی پیش آمده است';
                return $this->redirect(['hotels']);
            }
        } else {

            $_SESSION['result2'] = 'در ارسال اطلاعات مشکلی پیش آمده است';
            return $this->redirect(['hotels']);
        }


    }


    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

//
//    public function actionInit()
//    {
//
//        $auth = Yii::$app->authManager;
//
//        $admin = $auth->createRole('admin');
//        $auth->add($admin);
//
//
//
//        $costumer = $auth->createRole('manager');
//        $auth->add($costumer);
//
//
//        $user = $auth->createRole('user');
//        $auth->add($user);
//
//
//
//    }
}
