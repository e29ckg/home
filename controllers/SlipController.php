<?php

namespace app\controllers;

use Yii;
use app\models\Slip;
use app\models\profile;
use app\models\SlipUser;
use app\models\Log;
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

/**
 * Web_linkController implements the CRUD actions for Slip model.
 */
class SlipController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slip models.
     * @return mixed
     */
    public function actionIndex()
    {  
        $User_id = Yii::$app->user->identity->id;      
        $models = Slip::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy([
            // 'create_at'=>SORT_DESC,
            'slip_id' => SORT_DESC,
            ])->limit(100)->all();        
        
        // $countAll = Slip::getCountOne();

        return $this->render('index', [
            'models' => $models,
            // 'countAll' => $countAll,
        ]);
    }

    public function actionAdmin()
    {
        $modelUsers = SlipUser::find()->orderBy(['status' => SORT_ASC])->all();
        
        return $this->render('index_admin', [
            // 'models' => $models,
            'modelUsers' => $modelUsers,
            // 'countAll' => $countAll,
        ]);
    }

    public function actionAdmin_user()
    {
        $modelUsers = SlipUser::find()->orderBy(['status' => SORT_ASC])->all();
        
        return $this->render('index_admin_user', [
            // 'models' => $models,
            'modelUsers' => $modelUsers,
            // 'countAll' => $countAll,
        ]);
    }
    
    public function actionExport()
    {   
        return $this->render('index_export', [
            // 'models' => $models,
        ]);
    }

    public function actionExport_excel()
    {   
        return $this->render('_export_excel', [
            // 'models' => $models,
        ]);
    }

    public function actionExport_m($y,$m)
    {   
        $this->layout = 'blank';
        $models = Slip::find()->where(['slip_year' => $y ,'slip_month' => $m])->all();
        return $this->render('_export_excel', [
            'models' => $models,
        ]);
    }
    /**
     * Displays a single Slip model.
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
     * Creates a new Slip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate_s($id=null)
    {
        
        $model = new Slip();

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            // 'id' => 'ID',
            $model->user_id = $id;
            $model->slip_month = (int)date("m");
            $model->slip_year = (int)date("Y");
            $model->slip_bank = $_POST['Slip']['slip_bank'];
            $model->slip_salary = $_POST['Slip']['slip_salary'];
            $model->slip_salary2 = $_POST['Slip']['slip_salary2'];
            $model->slip_position = $_POST['Slip']['slip_position'];
            $model->slip_position2 = $_POST['Slip']['slip_position2'];
            $model->slip_special = $_POST['Slip']['slip_special'];
            $model->slip_special2 = $_POST['Slip']['slip_special2'];
            $model->slip_spem = $_POST['Slip']['slip_spem'];
            $model->slip_spem2 = $_POST['Slip']['slip_spem2'];
            $model->slip_ptk = $_POST['Slip']['slip_ptk'];
            $model->slip_ptk2 = $_POST['Slip']['slip_ptk'];
            $model->slip_future = $_POST['Slip']['slip_future'];
            $model->slip_future2 = $_POST['Slip']['slip_future2'];
            $model->slip_full = $_POST['Slip']['slip_full'];
            $model->slip_juscoop = $_POST['Slip']['slip_juscoop'];
            $model->slip_tax = $_POST['Slip']['slip_tax'];
            $model->slip_cremation = $_POST['Slip']['slip_cremation'];
            $model->slip_aia = $_POST['Slip']['slip_aia'];
            $model->slip_kasikorn = $_POST['Slip']['slip_kasikorn'];
            $model->slip_aom = $_POST['Slip']['slip_aom'];
            $model->slip_justice = $_POST['Slip']['slip_justice'];
            $model->slip_kbk = $_POST['Slip']['slip_kbk'];
            $model->slip_kbk2 = $_POST['Slip']['slip_kbk2'];
            // $model->file = $_POST['Slip']['file'];
            // $model->slip_create = $_POST['Slip']['slip_create'];
            // $model->slip_update = $_POST['Slip']['slip_update'];

            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin']);
            }   
        }
        if(date("m")==1){
            $yearBack = date("Y")-1 ;
            $monBack = 12;
        }
        else{
            $yearBack = date("Y") ;
            $monBack = date("m")-1;
        }
        
        $modelSlip = Slip::findOne(['user_id' => $id,'slip_year' => $yearBack , 'slip_month' => $monBack]);
        
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_create_slip',[
                    'model' => $model, 
                    'modelSlip' => $modelSlip                   
            ]);
        }else{
            return $this->render('_create_slip',[
                'model' => $model,   
                'modelSlip' => $modelSlip                 
            ]); 
        }
    }

    public function actionCreate_u()
    {
        $model = new SlipUser();

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            // 'id' => 'ID',
            $model->user_id = $_POST['SlipUser']['user_id'];
            $model->user_type = 1;
            $model->status = $_POST['SlipUser']['status'];

            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin_user']);
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

    /**
     * Updates an existing Slip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate_s($id)
    {
        $model = $this->findModel($id);

         //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->slip_bank = $_POST['Slip']['slip_bank'];
            $model->slip_salary = $_POST['Slip']['slip_salary'];
            $model->slip_salary2 = $_POST['Slip']['slip_salary2'];
            $model->slip_position = $_POST['Slip']['slip_position'];
            $model->slip_position2 = $_POST['Slip']['slip_position2'];
            $model->slip_special = $_POST['Slip']['slip_special'];
            $model->slip_special2 = $_POST['Slip']['slip_special2'];
            $model->slip_spem = $_POST['Slip']['slip_spem'];
            $model->slip_spem2 = $_POST['Slip']['slip_spem2'];
            $model->slip_ptk = $_POST['Slip']['slip_ptk'];
            $model->slip_ptk2 = $_POST['Slip']['slip_ptk'];
            $model->slip_future = $_POST['Slip']['slip_future'];
            $model->slip_future2 = $_POST['Slip']['slip_future2'];
            $model->slip_full = $_POST['Slip']['slip_full'];
            $model->slip_juscoop = $_POST['Slip']['slip_juscoop'];
            $model->slip_tax = $_POST['Slip']['slip_tax'];
            $model->slip_cremation = $_POST['Slip']['slip_cremation'];
            $model->slip_aia = $_POST['Slip']['slip_aia'];
            $model->slip_kasikorn = $_POST['Slip']['slip_kasikorn'];
            $model->slip_aom = $_POST['Slip']['slip_aom'];
            $model->slip_justice = $_POST['Slip']['slip_justice'];
            $model->slip_kbk = $_POST['Slip']['slip_kbk'];
            $model->slip_kbk2 = $_POST['Slip']['slip_kbk2'];
            // $model->file = $_POST['Slip']['file'];
            // $model->slip_create = $_POST['Slip']['slip_create'];
            // $model->slip_update = $_POST['Slip']['slip_update'];
            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin']);
            }   
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_update_slip',[
                    'model' => $model,                    
            ]);
        }else{
            return $this->render('_update_slip',[
                'model' => $model,                    
            ]); 
        }

        
    }

    public function actionUpdate_u($id)
    {
        $model = $this->findModelUser($id);

         //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $model->user_id = $_POST['SlipUser']['user_id'];
            $model->user_type = 1;
            $model->status = (int)$_POST['SlipUser']['status'];

            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin_user']);
            }   
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_update_u',[
                    'model' => $model,                    
            ]);
        }else{
            return $this->render('_update_u',[
                'model' => $model,                    
            ]); 
        }

        
    }

    public function actionPrint($id)
    {
        $this->layout = 'blank';
        $model = $this->findModel($id);
        return $this->render('print',[
            'model' => $model,                    
        ]);
        
    }
    /**
     * Deletes an existing Slip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $fileName = $model->file;
        $dir = Url::to('@webroot/uploads/Slip/');
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if($fileName && is_file($dir.$fileName)){
            unlink($dir.$fileName);// ลบ รูปเดิม;   
        }        
        
        $model->delete();

        return $this->redirect(['admin']);
    }

    public function actionDelete_user($id)
    {
        $model = $this->findModelUser($id);
        
        $model->delete();

        return $this->redirect(['admin_user']);
    }

    public function actionShow($id){

        $model = $this->findModel($id);
    
        if(!($model->user_id == Yii::$app->user->identity->id)){
            Yii::$app->session->setFlash('error', 'ไม่มีสิทธ์');
            return $this->redirect(['Slip/index']);
        }
        // This will need to be the path relative to the root of your app.
        $filePath = '/web/uploads/Slip';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->file);
        if(is_file($completePath)){

        $modelLog = new Log();
        $modelLog->user_id = Yii::$app->user->identity->id;
        $modelLog->manager = 'Slip_Read';
        $modelLog->detail = $id;
        $modelLog->create_at = date("Y-m-d H:i:s");
        $modelLog->ip = Yii::$app->getRequest()->getUserIP();
        $modelLog->save();

        return Yii::$app->response->sendFile($completePath, $model->file, ['inline'=>true]);
        }else{
            Yii::$app->session->setFlash('error', 'ไม่พบ File... ');
            return $this->redirect(['Slip/index']);
        }
    }

    public function actionShow_admin($id=null){

        $model = $this->findModel($id);
    
        // This will need to be the path relative to the root of your app.
        $filePath = '/web/uploads/Slip';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->file);
        if(is_file($completePath)){

        $modelLog = new Log();
        $modelLog->user_id = Yii::$app->user->identity->id;
        $modelLog->manager = 'Slip_Admin_Read';
        $modelLog->detail = $id;
        $modelLog->create_at = date("Y-m-d H:i:s");
        $modelLog->ip = Yii::$app->getRequest()->getUserIP();
        $modelLog->save();

        return Yii::$app->response->sendFile($completePath, $model->file, ['inline'=>true]);
        }else{
            Yii::$app->session->setFlash('error', 'ไม่พบ File... ');
            return $this->redirect(['Slip/index',['id' => $completePath]]);
        }
    }

    /**
     * Finds the Slip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slip::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelUser($id)
    {
        if (($model = SlipUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
