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
                'only' => ['lap-dpa','exp-excel','exp-pdf'],
                'rules' => [
                    [
                        'actions' => ['lap-dpa','exp-excel','exp-pdf'],
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
    
    public function actionExpExcel(array $params) {
        
        $model = new LaporanForm();
        $model->dpa = $params['dpa'];
        $model->unitPemilik = $params['unitPemilik'];
        $model->unitPengolah = $params['unitPengolah'];
               
        $dataProvider = $model->search();
        
        $dataProvider->pagination = ['pageSize'=>FALSE];
        
        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
        //set template
        $template = Yii::getAlias('@app/views/laporan').'/_dparep.xlsx';
        $objPHPExcel = $objReader->load($template);
        $activeSheet = $objPHPExcel->getActiveSheet();
        // set orientasi dan ukuran kertas
        $activeSheet->getPageSetup()
                ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
                ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);
        
        $baseRow=3;
        foreach ($dataProvider->getModels() as $arsip) {
            $activeSheet->setCellValue('A'.$baseRow, $baseRow-2)
                    ->setCellValue('B'.$baseRow, $arsip->no_def)
                    ->setCellValue('C'.$baseRow, $arsip->kd_masalah)
                    ->setCellValue('D'.$baseRow, $arsip->pemilik->nama_instansi)
                    ->setCellValue('E'.$baseRow, $arsip->uraian)
                    ->setCellValue('F'.$baseRow, $arsip->kurun_waktu)
                    ->setCellValue('G'.$baseRow, $arsip->pengolah->nama_pengolah)
                    ->setCellValue('H'.$baseRow, $arsip->rak->nama_rak)
                    ->setCellValue('I'.$baseRow, $arsip->no_box)
                    ->setCellValue('J'.$baseRow, $arsip->dpa->keterangan);
            $baseRow++;
        }
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="_dparep.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        $objWriter->save('php://output');
        exit;
    }
    
    public function actionExpPdf(array $params) {
        $model = new LaporanForm();
        $model->dpa = $params['dpa'];
        $model->unitPemilik = $params['unitPemilik'];
        $model->unitPengolah = $params['unitPengolah'];
               
        $dataProvider = $model->search();
        
        $dataProvider->pagination = ['pageSize'=>FALSE];
        
        $html = $this->renderPartial('_exppdf', ['dataProvider'=>$dataProvider]);
        
        $mpdf = new \mPDF('c','A4-L','','',0,0,0,0,0,0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        $mpdf->WriteHTML($html);
        $mpdf->Output(); 

        exit;
    }
}
