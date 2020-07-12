<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblcathotel;
use backend\models\TblcathotelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CathotelController implements the CRUD actions for Tblcathotel model.
 */
class CathotelController extends Controller
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
     * Lists all Tblcathotel models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblcathotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
        ]);
    }

    /**
     * Displays a single Tblcathotel model.
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
     * Creates a new Tblcathotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Tblcathotel();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->fileh = UploadedFile::getInstance($model, 'fileh');

            if($model->fileh!=null){

//                if ($model->validate()) {
                $model->fileh->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->fileh->baseName . '.' . $model->fileh->extension);
                $model->logo=$model->fileh->baseName . '.' . $model->fileh->extension;
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
                ]);
            }
            $model->id_hotel=$id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tblcathotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->fileh = UploadedFile::getInstance($model, 'fileh');

            if($model->fileh!=null){

//                if ($model->validate()) {
                $model->fileh->saveAs(Yii::getAlias('@upload') . '/upload/' . $model->fileh->baseName . '.' . $model->fileh->extension);
                $model->logo=$model->fileh->baseName . '.' . $model->fileh->extension;
//                }else{
//                    $_SESSION['error']='در آپلود عکس مشکلی پیش آمده است';
//                    return $this->render('create', [
//                        'model' => $model,
//                    ]);
//                }
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tblcathotel model.
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
     * Finds the Tblcathotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblcathotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblcathotel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
