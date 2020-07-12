<?php

namespace backend\controllers;

use backend\models\Tblkhadamat;
use Yii;
use backend\models\Tbldes;
use backend\models\TbldesSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DesController implements the CRUD actions for Tbldes model.
 */
class DesController extends Controller
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
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tbldes models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TbldesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
        ]);
    }

    /**
     * Displays a single Tbldes model.
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
     * Creates a new Tbldes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_hotel)
    {
        $model = new Tbldes();
        $statusArr=ArrayHelper::map(Tblkhadamat::find()->where(['id_hotel'=>$id_hotel])->all(),'id','name');
        if ($model->load(Yii::$app->request->post()) ) {
            $model->filed = UploadedFile::getInstance($model, 'filed');
            if ($model->filed != null) {

                $model->filed->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->filed->baseName . '.' . $model->filed->extension);
                $model->logo = $model->filed->baseName . '.' . $model->filed->extension;

            } else {
                $_SESSION['error'] = 'عکس نمیتواند خالی باشد';
                return $this->render('create', [
                    'model' => $model,
                    'statusArr'=>$statusArr,

                ]);
            }


            $model->id_hotel = $id_hotel;


            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'statusArr'=>$statusArr,
        ]);
    }

    /**
     * Updates an existing Tbldes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $statusArr=ArrayHelper::map(Tblkhadamat::find()->where(['id_hotel'=>$model->id_hotel])->all(),'id','name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'statusArr'=>$statusArr,
        ]);
    }

    /**
     * Deletes an existing Tbldes model.
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
     * Finds the Tbldes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbldes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbldes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
