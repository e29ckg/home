<?php

namespace app\controllers;

use Yii;
use app\models\SignBossName;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\web\Response;
use yii\widgets\ActiveForm;
use kartik\mpdf\Pdf;

/**
 * Web_linkController implements the CRUD actions for SignBossName model.
 */
class Sign_boss_nameController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin'],
                'rules' => [
                    [
                        'actions' => ['admin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SignBossName models.
     * @return mixed
     */
    public function actionTest()
    {
       echo Yii::$app->google->shortUrl('http://www.pkkjc.coj.go.th/');
    echo Yii::$app->google->expandUrl('https://goo.gl/p1EnW1');
    return Yii::$app->google->shortUrl('https://pkkjc.coj.go.th/th/page/item/index/id/1');
    }

    public function actionIndex()
    {
        $models = SignBossName::find()->orderBy([
            'create_at'=>SORT_DESC,
            'id' => SORT_DESC,
            ])->limit(100)->all();
                
        $countAll = SignBossName::getCountAll();

        return $this->render('index', [
            'models' => $models,
            'countAll' => $countAll,
        ]);
    }

    public function actionAdmin()
    {        
        $models = SignBossName::find()
            // ->where(['status' => 1])
            ->orderBy([
                'date_create'=>SORT_DESC,
                'id' => SORT_DESC,
                ])
            ->limit(100)
            ->all();        
        
        $countAll = SignBossName::getCountAll();

        return $this->render('admin', [
            'models' => $models,
            'countAll' => $countAll,
        ]);
    }
    public function actionAdmin4()
    {        
        $models = SignBossName::find()
            ->where(['status' => 4])
            ->orderBy([
                'date_create'=>SORT_DESC,
                'id' => SORT_DESC,
                ])
            ->limit(100)
            ->all();        
        
        $countAll = SignBossName::getCountAll();

        return $this->render('admin', [
            'models' => $models,
            'countAll' => $countAll,
        ]);
    }
    

    /**
     * Displays a single SignBossName model.
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
     * Creates a new SignBossName model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignBossName();

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {            
            $model->name = $_POST['SignBossName']['name'];
            $model->dep1 = $_POST['SignBossName']['dep1'];
            $model->dep2 = $_POST['SignBossName']['dep2'];
            $model->dep3 = $_POST['SignBossName']['dep3'];
            $model->status = $_POST['SignBossName']['status'];
            $model->date_create = date("Y-m-d H:i:s");
            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin']);
            }   
        }

        // $model->tel = explode(',', $model->tel);
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('create',[
                    'model' => $model,                    
            ]);
        }else{
            return $this->render('create',[
                'model' => $model,                    
            ]); 
        }
    }

    public function actionC2()
    {
        $model = new SignBossName();

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $f = UploadedFile::getInstance($model, 'img');
            if(!empty($f)){
                $dir = Url::to('@webroot/uploads/SignBossName/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                } 
                                
                $fileName = md5($f->baseName . time()) . '.' . $f->extension;
                if($f->saveAs($dir . $fileName)){
                    $model->img = $fileName;
                }               
            } 
            $model->name = $_POST['SignBossName']['name'];
            $model->link = $_POST['SignBossName']['link'];
            $model->create_at = date("Y-m-d H:i:s");
            $model->update_at = date("Y-m-d H:i:s");
            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin']);
            }   
        }

        // $model->tel = explode(',', $model->tel);
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('f2',[
                    'model' => $model,                    
            ]);
        }else{
            return $this->render('f2',[
                'model' => $model,                    
            ]); 
        }
    }

    /**
     * Updates an existing SignBossName model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       
        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->name = $_POST['SignBossName']['name'];
            $model->dep1 = $_POST['SignBossName']['dep1'];
            $model->dep2 = $_POST['SignBossName']['dep2'];
            $model->dep3 = $_POST['SignBossName']['dep3'];
            $model->status = $_POST['SignBossName']['status'];
            $model->date_create = date("Y-m-d H:i:s");
            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin']);
            }   
        }
        

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('update',[
                    'model' => $model,                    
            ]);
        }else{
            return $this->render('update',[
                'model' => $model,                    
            ]); 
        }

        
    }

    /**
     * Deletes an existing SignBossName model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        $model->delete();

        return $this->redirect(['admin']);
    }

    public function actionShow($id=null){
        $mdSignBossName = SignBossName::find()->where(['id' => $id])->one();

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('show',[
                    'model' => $mdSignBossName,                    
            ]);
        }
        
        return $this->render('show',[
               'model' => $mdSignBossName,                    
        ]);
    }

    /**
     * Finds the SignBossName model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SignBossName the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SignBossName::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionPrint($id = null)
    {
        // $this->layout = 'cart_shop';   
        // $user_id = Yii::$app->user->id;
        // $model = $this->findModel($id);
        $user_id = Yii::$app->user->id;
        // $model_lists = OrderList::find()->where(['order_code'=> $model->order_code])->all();

        // $destination = Pdf::DEST_BROWSER;
        // $destination = Pdf::DEST_DOWNLOAD;
        $destination = Pdf::DEST_FILE;
// 
        $filename = Yii::$app->basePath .'/web/uploads/a1.pdf';
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    $pdf = new Pdf([
        'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
        'content' => $this->renderPartial('print',[]),
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT,
        // stream to browser inline
        'destination' => $destination,
        'filename' => $filename,
        // 'cssFile' => 'css/pdf.css',
        'options' => [
            // any mpdf options you wish to set
        ],
        'methods' => [
            // 'SetTitle' => 'Privacy Policy - Krajee.com',
            // 'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
            // 'SetHeader' => ['Krajee Privacy Policy||Generated On: ' . date("r")],
            // 'SetFooter' => ['|Page {PAGENO}|'],
            // 'SetAuthor' => 'Kartik Visweswaran',
            // 'SetCreator' => 'Kartik Visweswaran',
            // 'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
        ]
    ]);
    // $mpdf = $pdf->api;
     // fetches mpdf api
    //  $html = self::generateTablePdf($id);
    //  $mpdf->shrink_tables_to_fit = 8;
    //  $mpdf->use_kwt = true;
    //  $mpdf->table_keep_together = true;
    //  $mpdf->WriteHtml($html);
     // call mpdf write html
    //  $filename = \Yii::$app->basePath . '/web/uploads/1.pdf';
    //  $mpdf->Output($filename, 'F');
    $pdf->render();
    // return $pdf->render();
    return $this->redirect(['index']);
    }
}
