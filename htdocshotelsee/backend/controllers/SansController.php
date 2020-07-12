<?php

namespace backend\controllers;

use backend\models\Tblkhadamat;
use Yii;
use backend\models\Tblsans;
use backend\models\TblsansSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SansController implements the CRUD actions for Tblsans model.
 */
class SansController extends Controller
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
     * Lists all Tblsans models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblsansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
        ]);
    }

    /**
     * Displays a single Tblsans model.
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
     * Creates a new Tblsans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($status,$id_hotel)
    {
       
        $model = new Tblsans();
        if($status==0){
           $statusArr=ArrayHelper::map(Tblkhadamat::find()->where(['id_hotel'=>$id_hotel])->all(),'id','name');
        }else{
            $statusArr=0;
        }
        $days=['all'=>'همه روزه','Saturday'=>'شنبه','Sunday'=>'یکشنبه','Monday'=>'دوشنبه','Tuesday'=>'سه شنبه','Wednesday'=>'چهار شنبه','Thursday'=>'پنج شنبه','Friday'=>'جمعه'];
        if ($model->load(Yii::$app->request->post())) {

            if($status!=0){
                $model->id_khadamat=$status;
            }

            $model->id_hotel=$id_hotel;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'days'=>$days,
            'statusArr'=>$statusArr,
        ]);
    }

    /**
     * Updates an existing Tblsans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {


        $model = $this->findModel($id);
        $statusArr=ArrayHelper::map(Tblkhadamat::find()->where(['id_hotel'=>$model->id_hotel])->all(),'id','name');


        $days=['همه روزه'=>'همه روزه','شنبه'=>'شنبه','یک شنبه'=>'یکشنبه','دوشنبه'=>'دوشنبه','سه شنبه'=>'سه شنبه','چهار شنبه'=>'چهار شنبه','پنج شنبه'=>'پنج شنبه','جمعه'=>'جمعه'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'days'=>$days,
            'statusArr'=>$statusArr,
        ]);
    }

    /**
     * Deletes an existing Tblsans model.
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
     * Finds the Tblsans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblsans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblsans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
