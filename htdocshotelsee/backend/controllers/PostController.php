<?php

namespace backend\controllers;

use backend\models\Tblcatpost;
use Yii;
use backend\models\Tblpost;
use backend\models\TblpostSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Tblpost model.
 */
class PostController extends Controller
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
             //                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblpost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblpostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblpost model.
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
     * Creates a new Tblpost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblpost();
        $cat=ArrayHelper::map(Tblcatpost::find()->where(['enable'=>1])->all(),'id','title');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'cat'=>$cat,
        ]);
    }

    /**
     * Updates an existing Tblpost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {


        $cat=ArrayHelper::map(Tblcatpost::find()->where(['enable'=>1])->all(),'id','title');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            
            if(!$model->save()){
                $_SESSION['error']='در ذخیره اطلاعات مشکلی پیش آمده است';
                return $this->render('update', [
                    'model' => $model,
                    'cat'=>$cat,

                ]);
            }else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
       
        }

            return $this->render('update', [
                'model' => $model,
                'cat'=>$cat,

            ]);

    }

    /**
     * Deletes an existing Tblpost model.
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
     * Finds the Tblpost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblpost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblpost::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
