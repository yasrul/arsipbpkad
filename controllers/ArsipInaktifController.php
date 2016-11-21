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
        //$dest = Yii::getAlias('@app/fileupload');
        $model = new ArsipInaktif();

        if ($model->load(Yii::$app->request->post())) {
            $upload = $model->uploadFile();
            
            if ($model->save()) {
                if ($upload) {
                    $path = $model->getPathFile();
                    $upload->saveAs($path);
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
        
        $oldPathFile = $model->getPathFile();
        $oldFilename = $model->filename;
        $oldSrcFile = $model->source_file;

        if ($model->load(Yii::$app->request->post())) {
            $upload = $model->uploadFile();
            
            if ($upload === FALSE) {
                $model->filename = $oldFilename;
                $model->source_file = $oldSrcFile;
            }
            if ($model->save()) {
                if ($upload !== FALSE) {
                    if ($oldPathFile !== NULL && file_exists($oldPathFile)) {
                        unlink($oldPathFile);
                    }
                    $path = $model->getPathFile();
                    $upload->saveAs($path);
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
        $model = $this->findModel($id);
                
        if ($model->delete()) {
            if(!$model->deleteFile()) {
                Yii::$app->session->setFlash('error', 'Error deleting file');
            }
        }        

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
    
    public function actionDownload($id) {
        $download = ArsipInaktif::findOne($id);
        $path = Yii::getAlias('@app').'/fileupload/'.$download->source_file;
        
        if(file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }
}
