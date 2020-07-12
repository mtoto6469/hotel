<?php

namespace frontend\controllers;

use common\components\jdf;
use common\models\User;
use frontend\models\Tbhotel;
use frontend\models\Tblcod;
use frontend\models\Tblroom;
use Yii;
use frontend\models\Tblprofile;
use frontend\models\TblprofileSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for Tblprofile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblprofile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblprofile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tblprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblprofile();


        if ($model->load(Yii::$app->request->post()) ) {
            $role=$model->role;
            $user=User::findOne(Yii::$app->user->getId());


            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file!=null) {

                $model->file->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file->baseName . '.' . $model->file->extension);
                $model->img = $model->file->baseName . '.' . $model->file->extension;

            }
            if($model->role=='manager'){
                $hotel=Tbhotel::findOne($_SESSION['id_hotel']);
                $code='1-'.$_SESSION['id_hotel'].'-'.$model->cod_manager;
                if($code!=$hotel->cod_manager ){

                    $_SESSION['resultSign']='کد ارسالی درست نمی باشد ';
                    return $this->render('create', [
                        'model' => $model,
                        'role'=>$role,
                    ]);
//   role=manager             برگردد به همون صفحه ای که ازش اومده
                }else{

                    $model->cod_manager=$code;
                  $model->id_user=Yii::$app->user->getId();
                  $model->id_hotel=$_SESSION['id_hotel'];

                    $model->username=$user->username;
                    if($model->save()){
//                       در اینجا نقش در جدول ایتم اپدیت شود

                        return $this->redirect(['site/hotel','id'=>$_SESSION['id_hotel']]);
                    }else{

                        $_SESSION['resultSign']='در ذخیره اطلاعات مشکلی پیش آمده است';
                        return $this->render('create', [
                            'model' => $model,
                            'role'=>$role,
                        ]);
                    }
                }
            }
            else{

                if($model->date_enter_id!=null && $model->date_exit_ir!=null && $model->count_peapel!=null && $model->rome_number!=null){
                    $code='0-'.$_SESSION['id_hotel'].'-'.$model->cod_manager;
                    $checkCod=Tblcod::find()->where(['code'=>$code])->andWhere(['enable'=>1])->one();
                    if($checkCod==null){
                        $_SESSION['resultSign']='   کد ارسالی درست نمی باشد یا قبلا استفاده شده است';
                        return $this->render('create', [
                            'model' => $model,
                            'role'=>$role,
                        ]);

                    }else{
                        $checkCod->enable=0;
                        $checkCod->save();
                        $model->cod_manager=$code;
                    }
                    $model->id_user=$user->id;
                    $model->id_hotel=$_SESSION['id_hotel'];

                    $date_ir = new jdf();
                    $time = explode("/", $model->date_enter_id);
                    $d = $time[0];
                    $m = $time[1];
                    $y = $time[2];
                    $time2 = $date_ir->jalaliToGregorian($y, $m, $d);

                    $Y = $time2[0] . '/';
                    $M = $time2[1] . '/';
                    $D = $time2[2];
                    $g = $Y . $M . $D;


                    $model->date_enter=date($g);
                    $time = explode("/",$model->date_exit_ir);
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

                    if($model->save()){

                        //                       در اینجا نقش در جدول ایتم اپدیت شود
                     

                        return $this->redirect(['site/hotel','id'=>$_SESSION['id_hotel']]);
                    }else{
                        $checkCod->enable=1;
                        $checkCod->save();
                        $_SESSION['resultSign']='در ذخیره اطلاعات مشکلی پیش آمده است';
                        return $this->render('create', [
                            'model' => $model,
                            'role'=>$role,
                        ]);
                    }
                }else{

                    $_SESSION['resultSign']='اطلاعات ارسالی درست نمی باشد';
                    return $this->render('create', [
                        'model' => $model,
                        'role'=>$role,
                    ]);
                    //                برگردد به همون صفحه ای که ازش اومده role=user
                }

            }

        }

        if(isset($_SESSION['role']) && $_SESSION['role']!=null && isset($_SESSION['id_hotel']) && $_SESSION['id_hotel']!=null){
            if($_SESSION['role']=='user'){
              $role='user';
            }else{
                $role='manager';
            }
            return $this->render('create', [
                'model' => $model,
                'role'=>$role,
            ]);
        }else{

            $_SESSION['result']='در ارسال اطلاعات مشکلی پیش آمده است';
            return $this->redirect(['site/signup']);
        }


    }

    /**
     * Updates an existing Tblprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $id=User::findOne(Yii::$app->user->id);
        if($id!=null){
            $model=Tblprofile::findOne(['id_user'=>$id->id]);
            if($model!=null){
                if ($model->load(Yii::$app->request->post()) ) {

                    if($model->password!=null){
                        $id->setPassword($model->password);
                        $id->save();
                    }
                    if($model->date_exit_ir!='void'){
                        $date_ir = new jdf();
                        $time = explode("/",$model->date_exit_ir);
                        $d = $time[0];
                        $m = $time[1];
                        $y = $time[2];
                        $time2 = $date_ir->jalaliToGregorian($y, $m, $d);

                        $Y = $time2[0] . '/';
                        $M = $time2[1] . '/';
                        $D = $time2[2];
                        $gg = $Y . $M . $D;
                        $model->date_exit=date($gg);
                    }
                     $model->save();
                    $this->redirect(['site/hotel','id'=>$model->id_hotel]);
                }
                $role=$model->role;
                $hotel=\frontend\models\Tbhotel::findOne($model->id_hotel);
                $logo_hotel=$hotel->logo_hotel;
                $name_hotel=$hotel->name_hotel;
                $username=$id->username;
                $code=explode('-',$model->cod_manager);
                if(count($code)==3){
                    $cod=$code[2]; 
                }else{
                    $cod='-'; 
                }
                return $this->render('_form', [
                    'model' => $model,
                    'role'=>$role,
                    'image'=>$logo_hotel,
                    'name'=>$name_hotel,
                    'username'=>$username,
                    'cod'=>$cod,
                ]);
            }
            $_SESSION['errorsite']='اطلاعات ارسالی درست نیست ';

        }
        $_SESSION['errorsite']='اطلاعات ارسالی درست نیست ';

        return $this->redirect(['site/error2']);


    }

    /**
     * Deletes an existing Tblprofile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblprofile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
