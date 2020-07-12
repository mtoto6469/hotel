<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblroom;
use backend\models\TblroomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomController implements the CRUD actions for Tblroom model.
 */
class RoomController extends Controller
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
     * Lists all Tblroom models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblroomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id
        ]);
    }

    /**
     * Displays a single Tblroom model.
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
     * Creates a new Tblroom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Tblroom();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_hotel=$id;
            $check=Tblroom::find()->where(['id_hotel'=>$model->id_hotel])->andWhere(['number'=>$model->number])->andWhere(['name'=>$model->name])->count();
            if($check==0){
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $_SESSION['errorf']='قبلا این اتاق ثبت شده است';
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tblroom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $number=$model->number;
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->number==$number){
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $check=Tblroom::find()->where(['id_hotel'=>$model->id_hotel])->andWhere(['number'=>$model->number])->andWhere(['name'=>$model->name])->count();
                if($check==0){
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    $_SESSION['errorf']='قبلا این اتاق ثبت شده است';
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tblroom model.
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
     * Finds the Tblroom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblroom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblroom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
