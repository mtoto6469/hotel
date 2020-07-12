<?php

namespace backend\controllers;

use Yii;
use backend\models\Tbhotel;
use backend\models\TbhotelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HotelController implements the CRUD actions for Tbhotel model.
 */
class HotelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  
                ],
            ],
        ];
    }

    /**
     * Lists all Tbhotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbhotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbhotel model.
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
     * Creates a new Tbhotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbhotel();

        $cod_manager=rand(1000,30000);

//        echo $cod_manager;exit;

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file!=null){

//                if ($model->validate()) {
                    $model->file->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file->baseName . '.' . $model->file->extension);
                    $model->logo_hotel=$model->file->baseName . '.' . $model->file->extension;
//                }else{
//                    $_SESSION['error']='در آپلود عکس مشکلی پیش آمده است';
//                    return $this->render('create', [
//                        'model' => $model,
//                    ]);
//                }
            }else{
                $_SESSION['error']='لگو نمیتواند خالی باشد';
                return $this->render('create', [
                    'model' => $model,
                    'cod_manager'=>$cod_manager,
                ]);
            }

            $model->date=date('Y/m/d');
            date_default_timezone_set("Asia/Tehran");
            $model->time=time();
            $model->city_hotel='کیش';
            $model->city_hotel_en="kish";
            
            if(!$model->save()){
                return $this->render('create', [
                    'model' => $model,
                    'cod_manager'=>$cod_manager,
                ]);
            }
//            echo $model->id;exit;
//            1 برای اینکه مدیر هستش
             $model->cod_manager='1-'.$model->id.'-'.$model->cod_manager;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
            'cod_manager'=>$cod_manager,
        ]);
    }

    /**
     * Updates an existing Tbhotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
          $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file!=null){

//                if ($model->validate()) {
                $model->file->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file->baseName . '.' . $model->file->extension);
                $model->logo_hotel=$model->file->baseName . '.' . $model->file->extension;
//                }else{
//                    $_SESSION['error']='در آپلود عکس مشکلی پیش آمده است';
//                    return $this->render('create', [
//                        'model' => $model,
//                    ]);
//                }
            }
            $model->date=date('Y/m/d');
            date_default_timezone_set("Asia/Tehran");
            $model->time=time();
            $model->city_hotel='کیش';
            $model->city_hotel_en="kish";
            if(!$model->save()){
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tbhotel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['site/hotels']);
    }

    /**
     * Finds the Tbhotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbhotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbhotel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
