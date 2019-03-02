<?php

namespace app\controllers;

use Yii;
use app\models\Salary;
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
 * Web_linkController implements the CRUD actions for Salary model.
 */
class SalaryController extends Controller
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
     * Lists all Salary models.
     * @return mixed
     */
    public function actionIndex()
    {  
        $User_id = Yii::$app->user->identity->id;      
        $models = Salary::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy([
            'create_at'=>SORT_DESC,
            'id' => SORT_DESC,
            ])->limit(100)->all();        
        
        $countAll = Salary::getCountOne();

        return $this->render('index', [
            'models' => $models,
            'countAll' => $countAll,
        ]);
    }

    public function actionAdmin()
    {
        $models = Salary::find()->orderBy([
            'create_at'=>SORT_DESC,
            'id' => SORT_DESC,
            ])->limit(100)->all();        
        
        $countAll = Salary::getCountAll();

        return $this->render('index_admin', [
            'models' => $models,
            'countAll' => $countAll,
        ]);
    }
    

    /**
     * Displays a single Salary model.
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
     * Creates a new Salary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Salary();

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $f = UploadedFile::getInstance($model, 'file');
            if(!empty($f)){
                $dir = Url::to('@webroot/uploads/Salary/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                } 
                                
                $fileName = md5($f->baseName . time()) . '.' . $f->extension;
                if($f->saveAs($dir . $fileName)){
                    $model->file = $fileName;
                }               
            }else{
                $model->file = '';
            } 
            $model->user_id = $_POST['Salary']['user_id'];
            // $model->link = $_POST['Salary']['link'];
            $model->create_at = date("Y-m-d H:i:s");
            $model->update_at = date("Y-m-d H:i:s");
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

    /**
     * Updates an existing Salary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $fileName = $model->file;

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $f = UploadedFile::getInstance($model, 'file');
            if(!empty($f)){
                $dir = Url::to('@webroot/uploads/Salary/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                if($fileName && is_file($dir.$fileName)){
                    unlink($dir.$fileName);// ลบ รูปเดิม;   
                }
                $fileName = md5($f->baseName . time()) . '.' . $f->extension;
                if($f->saveAs($dir . $fileName)){
                    $model->file = $fileName;
                }               
            } 
            $model->user_id = $_POST['Salary']['user_id'];
            // $model->link = $_POST['Salary']['link'];
            $model->file = $fileName;
            $model->update_at = date("Y-m-d H:i:s");
            if($model->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['admin']);
            }   
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
     * Deletes an existing Salary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $fileName = $model->file;
        $dir = Url::to('@webroot/uploads/Salary/');
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if($fileName && is_file($dir.$fileName)){
            unlink($dir.$fileName);// ลบ รูปเดิม;   
        }        
        
        $model->delete();

        return $this->redirect(['admin']);
    }

    public function actionShow($id){

        $model = $this->findModel($id);
    
        if(!($model->user_id == Yii::$app->user->identity->id)){
            Yii::$app->session->setFlash('error', 'ไม่มีสิทธ์');
            return $this->redirect(['salary/index']);
        }
        // This will need to be the path relative to the root of your app.
        $filePath = '/web/uploads/salary';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->file);
        if(is_file($completePath)){

        $modelLog = new Log();
        $modelLog->user_id = Yii::$app->user->identity->id;
        $modelLog->manager = 'Salary_Read';
        $modelLog->detail = $id;
        $modelLog->create_at = date("Y-m-d H:i:s");
        $modelLog->ip = Yii::$app->getRequest()->getUserIP();
        $modelLog->save();

        return Yii::$app->response->sendFile($completePath, $model->file, ['inline'=>true]);
        }else{
            Yii::$app->session->setFlash('error', 'ไม่พบ File... ');
            return $this->redirect(['salary/index']);
        }
    }

    public function actionShow_admin($id=null){

        $model = $this->findModel($id);
    
        // This will need to be the path relative to the root of your app.
        $filePath = '/web/uploads/salary';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->file);
        if(is_file($completePath)){

        $modelLog = new Log();
        $modelLog->user_id = Yii::$app->user->identity->id;
        $modelLog->manager = 'Salary_Admin_Read';
        $modelLog->detail = $id;
        $modelLog->create_at = date("Y-m-d H:i:s");
        $modelLog->ip = Yii::$app->getRequest()->getUserIP();
        $modelLog->save();

        return Yii::$app->response->sendFile($completePath, $model->file, ['inline'=>true]);
        }else{
            Yii::$app->session->setFlash('error', 'ไม่พบ File... ');
            return $this->redirect(['salary/index',['id' => $completePath]]);
        }
    }

    /**
     * Finds the Salary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Salary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Salary::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
