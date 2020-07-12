<?php

namespace backend\controllers;

use Yii;
use backend\models\Tbllink;
use backend\models\TbllinkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LinkController implements the CRUD actions for Tbllink model.
 */
class LinkController extends Controller
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
                     // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tbllink models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TbllinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id
        ]);
    }

    /**
     * Displays a single Tbllink model.
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
     * Creates a new Tbllink model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($status)
    {
        $model = new Tbllink();

        if ($model->load(Yii::$app->request->post())) {
        
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file != null) {

                $model->file->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file->baseName . '.' . $model->file->extension);
                $model->img = $model->file->baseName . '.' . $model->file->extension;

            } else {
                $_SESSION['error'] = 'لگو نمیتواند خالی باشد';
                return $this->render('create', [
                    'model' => $model,

                ]);
            }


                $model->id_hotel = $status;


            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,

        ]);
    }

    /**
     * Updates an existing Tbllink model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $status)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file != null) {

                $model->file->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->file->baseName . '.' . $model->file->extension);
                $model->img = $model->file->baseName . '.' . $model->file->extension;

            }


                $model->id_hotel =$status;


            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'status' => $status,

        ]);
    }

    /**
     * Deletes an existing Tbllink model.
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
     * Finds the Tbllink model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbllink the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbllink::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
