<?php

namespace backend\controllers;

use backend\models\Tblcathotel;
use Yii;
use backend\models\Tblkhadamat;
use backend\models\TblkhadamatSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KhadamatController implements the CRUD actions for Tblkhadamat model.
 */
class KhadamatController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblkhadamat models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblkhadamatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
        ]);
    }

    /**
     * Displays a single Tblkhadamat model.
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
     * Creates a new Tblkhadamat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_hotel)
    {
        $model = new Tblkhadamat();
//        $cat=['restuarant'=>'رستوران/فست فود','coffe_shop'=>'کافی شاپ','parking'=>'پارکینگ','sport_hall'=>'سالن ورزشی','	store'=>'فروشگاه'
//        ,'snooker'=>'سالن بیلیارد','jaccuzzi'=>'سونا و جکوزی','sanna'=>'استخر','photography'=>'عکاسی','laundry'=>'خشکشویی','car_rental'=>'اجاره اتوموبیل','cleaning'=>'نظافت هتل','other'=>'سایر'
//        ];
        $cat=ArrayHelper::map(Tblcathotel::find()->where(['id_hotel'=>$id_hotel])->all(),'id','title');
        if ($model->load(Yii::$app->request->post())) {
            $model->file5 = UploadedFile::getInstance($model, 'file5');
            if ($model->file5 != null) {

                $model->file5->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file5->baseName . '.' . $model->file5->extension);
                $model->img = $model->file5->baseName . '.' . $model->file5->extension;

            } else {
                $_SESSION['error'] = 'عکس نمیتواند خالی باشد';
                return $this->render('create', [
                    'model' => $model,
                    'cat'=>$cat,
                ]);
            }

            $model->multyfile = UploadedFile::getInstances($model, 'multyfile');

            $model->img_menu ="";
                foreach ($model->multyfile as $file) {
                    $file->saveAs(Yii::getAlias('@upload') . '/upload/' .$file->baseName . '.' . $file->extension);
                    $model->img_menu .= $file->baseName . '.' . $file->extension.'#*';
                }

            $model->id_hotel=$id_hotel;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'cat'=>$cat,
        ]);
    }

    /**
     * Updates an existing Tblkhadamat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//        $cat=['restuarant'=>'رستوران/فست فود','coffe_shop'=>'کافی شاپ','parking'=>'پارکینگ','sport_hall'=>'سالن ورزشی','	store'=>'فروشگاه'
//            ,'snooker'=>'سالن بیلیارد','jaccuzzi'=>'سونا و جکوزی','sanna'=>'استخر','photography'=>'عکاسی','laundry'=>'خشکشویی','car_rental'=>'اجاره اتوموبیل','cleaning'=>'نظافت هتل','other'=>'سایر'
//        ];
        $cat=ArrayHelper::map(Tblcathotel::find()->where(['id_hotel'=>$model->id_hotel])->all(),'id','title');
        if ($model->load(Yii::$app->request->post()) ) {


            $model->file5 = UploadedFile::getInstance($model, 'file5');
            if ($model->file5 != null) {

                $model->file5->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file5->baseName . '.' . $model->file5->extension);
                $model->img = $model->file5->baseName . '.' . $model->file5->extension;

            }else{
                $model->file5="d";
            }

            $model->multyfile = UploadedFile::getInstances($model, 'multyfile');

        if($model->multyfile!=null){
            $model->img_menu ="";
            foreach ($model->multyfile as $file) {
                $file->saveAs(Yii::getAlias('@upload') . '/upload/' .$file->baseName . '.' . $file->extension);
                $model->img_menu .= $file->baseName . '.' . $file->extension.'#*';

            }

        }
            if(isset($_POST['imgno']) && $_POST['imgno']!=null && $_POST['imgno']==1){
                $model->img_menu=null;
            }
        if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);

        }else{
            return $this->render('update', [
                'model' => $model,
                'cat'=>$cat,
            ]);
        }
        }

        return $this->render('update', [
            'model' => $model,
            'cat'=>$cat,
        ]);
    }

    /**
     * Deletes an existing Tblkhadamat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $id_index=$model->id_hotel;
        $model->delete();

        return $this->redirect(['index','id'=>$id_index]);
    }

    /**
     * Finds the Tblkhadamat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblkhadamat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblkhadamat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
