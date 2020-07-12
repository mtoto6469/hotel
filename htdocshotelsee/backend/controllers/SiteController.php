<?php
namespace backend\controllers;

use backend\models\SignupForm;
use backend\models\Tbhotel;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','hotels','newhotel','signup','password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */



    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionPassword()
    {
        $model=User::findOne(Yii::$app->user->id);
        if (Yii::$app->request->post()) {
            if(isset($_POST['password']) && $_POST['password']!=null){
                $model->setPassword($_POST['password']);
                $model->save();
            }
            return $this->redirect('index');
            
        }
        return $this->render('password',[
            'model'=>$model,
            'name'=>$model->username,
        ]);
    }
    
    
    public function actionHotels(){
        
        $hotel=Tbhotel::find()->all();
        return $this->render('hotels',[
            'hotel'=>$hotel
        ]);
    }
    public function actionNewhotel($id){
        $hotel=Tbhotel::findOne($id);
        return $this->render('newhotel',[
            'hotel'=>$hotel,
        ]);
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = "login.php";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
         
            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
                $_SESSION['sin']=' ثبت نام'.$user->username.'  با موفقیت انجام شد ';
                    return $this->redirect(['site/index']);
//                }
            }
        }

      
        return $this->render('signup',[
            'model'=>$model,
           
        ]);

    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
