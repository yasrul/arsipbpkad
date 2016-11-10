<?php

namespace app\controllers;

use Yii;
use app\models\ArsipInaktif;
use app\models\search\ArsipInaktifSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArsipInaktifController implements the CRUD actions for ArsipInaktif model.
 */
class ArsipInaktifController extends Controller
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
     * Lists all ArsipInaktif models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArsipInaktifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArsipInaktif model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArsipInaktif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $dest = Yii::getAlias('@app/fileupload');
        $model = new ArsipInaktif();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $upload = UploadedFile::getInstance($model, 'filename');
            if ($upload !== null) $model->filename = $model->id.'_'.$upload->name;
            if ($model->save()) {
                if ($upload !== NULL) {
                    $upload->saveAs($dest.'/'.$model->id.'_'.$upload->name);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } 
        }
        return $this->render('create', ['model' => $model]);      
    }

    /**
     * Updates an existing ArsipInaktif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dest = Yii::getAlias('@app/fileupload');

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $upload = UploadedFile::getInstance($model, 'filename');
            if ($upload !== NULL) $model->filename = $model->id.'_'.$upload->name;
            if ($model->save()) {
                if ($upload !== null) {
                    $upload->saveAs($dest.'/'.$model->id.'_'.$upload->name);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing ArsipInaktif model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArsipInaktif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArsipInaktif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArsipInaktif::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetRaks($kdRuang) {
        $raks = (new \yii\db\Query())
                ->select('kode, nama_rak')->from('lok_rak')->where(['kd_ruang'=>$kdRuang])
                ->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['raks'=>$raks];
    }
}
