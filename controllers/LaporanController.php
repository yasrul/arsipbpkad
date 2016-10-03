<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LaporanForm;

/**
 * Description of LaporanController
 *
 * @author yasrul
 */
class LaporanController extends Controller {
    //put your code here
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['lap-dpa'],
                'rules' => [
                    [
                        'actions' => ['lap-dpa'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }
    
    public function actionLapDpa() {
        $model = new LaporanForm();
        $dataProvider = $model->search(\Yii::$app->request->queryParams);
        
        return $this->render('lap-dpa', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
        
    }
}
