<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblcatpost;
use backend\models\TblcatpostSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CatpostController implements the CRUD actions for Tblcatpost model.
 */
class CatpostController extends Controller
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
     * Lists all Tblcatpost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblcatpostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblcatpost model.
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
     * Creates a new Tblcatpost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblcatpost();
        $cat=ArrayHelper::map(Tblcatpost::find()->where(['enable'=>1])->andWhere(['id_parent'=>0])->all(),'id','title');
        if ($model->load(Yii::$app->request->post()) ) {

            $model->filec = UploadedFile::getInstance($model, 'filec');

            if($model->filec!=null){

//                if ($model->validate()) {
                $model->filec->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->filec->baseName . '.' . $model->filec->extension);
                $model->logo=$model->filec->baseName . '.' . $model->filec->extension;
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
                    'cat'=>$cat,
                ]);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'cat'=>$cat,
        ]);
    }

    /**
     * Updates an existing Tblcatpost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $cat=ArrayHelper::map(Tblcatpost::find()->where(['enable'=>1])->andWhere(['id_parent'=>0])->all(),'id','title');

        if($model->id_parent!=0){
            $error=0;
            if ($model->load(Yii::$app->request->post()) ) {
                $model->filec = UploadedFile::getInstance($model, 'filec');
                if($model->filec!=null){

                    $model->filec->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->filec->baseName . '.' . $model->filec->extension);
                    $model->logo=$model->filec->baseName . '.' . $model->filec->extension;

                }
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }else{
            $_SESSION['error']='این دسته قابل ویرایش نمی باشد';
            $error=1;
        }

       

        return $this->render('update', [
            'model' => $model,
            'error'=>$error,
            'cat'=>$cat,
        ]);
    }

    /**
     * Deletes an existing Tblcatpost model.
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
     * Finds the Tblcatpost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblcatpost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblcatpost::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
