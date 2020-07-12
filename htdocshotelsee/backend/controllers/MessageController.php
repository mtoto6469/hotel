<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblmessage;
use backend\models\TblmessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MessageController implements the CRUD actions for Tblmessage model.
 */
class MessageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [


            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblmessage models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblmessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
'id'=>$id,


        ]);
    }

    /**
     * Displays a single Tblmessage model.
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
     * Creates a new Tblmessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblmessage();
        $sesssion = yii::$app->session;

        if (!$sesssion->isActive) {

            $sesssion->open();
            
        }
            if ($model->load(Yii::$app->request->post()) ) {
                $model->id_user=Yii::$app->user->getId();
                $model->visit=0;
                $model->save();

                $_SESSION['suc-me']='پیام با موفقیت ارسال شد';
                if($model->id_hotel==0){
                    return $this->redirect(['site/contact']);
                }else{
                    return $this->redirect(['site/hotel','id'=>$model->id_hotel]);  
                }
               
                
            
        }
        
        return $this->redirect(['site/contact']);
    }

    /**
     * Updates an existing Tblmessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tblmessage model.
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
     * Finds the Tblmessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ida
     * @return Tblmessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblmessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
