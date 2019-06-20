<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Profile;
use app\models\Log;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\Session;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','profile'],
                'rules' => [
                    [
                        'actions' => ['index','profile'],
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
    
    public function actionIndex(){
        $this->layout = 'main';

        // $sql = "SELECT id, name, sname FROM profile ";       
        // $data = Yii::$app->db->createCommand($sql)->queryAll();
        $models = User::find()->where(['status' => 10])->all();
       
        return $this->render('index',[
            'models' => $models,
            'userAll' => User::getCountAll(),
            'userDis' => User::getCountDis(),
            'userActive' => User::getCountActive(),
        ]);
    }

    public function actionIndex_dis(){
        $this->layout = 'main';

        // $sql = "SELECT id, name, sname FROM profile ";       
        // $data = Yii::$app->db->createCommand($sql)->queryAll();
        $models = User::find()->where(['status' => 0])->all();
       
        return $this->render('index_dis',[
            'models' => $models,
            'userAll' => User::getCountAll(),
            'userDis' => User::getCountDis(),
            'userActive' => User::getCountActive(),
        ]);
    }

    public function actionCreate() {
     
        $model = new User();

        //Add This For Ajax Email Exist Validation 
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        } 

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {            
            
            $model->password_hash = Yii::$app->security->generatePasswordHash('password');
            $model->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
            $model->created_at = date("Y-m-d H:i:s");

            if($model->save()){
                Yii::$app->session->setFlash('success', ['บันทึกเรียบร้อย']);
                $mU = User::findOne(['username' => $_POST['User']['username']]);

                $mP = new Profile();
                $mP->user_id = $mU->id;
                $mP->name = $_POST['User']['username'];
                $mP->img = '';
                $mP->save();
                return $this->redirect(['index']);
           } 
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form',[
                    'model' => $model,                
            ]);
        }
            return $this->render('_form',[
                'model' => $model,                     
            ]); 
        
    }

    public function actionUpdate_username($id){
        // $model = User::findOne($id);
        $model = User::findOne($id);

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        } 

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {            
            
            $model->updated_at = date("Y-m-d H:i:s");

            if($model->save()){
                Yii::$app->session->setFlash('success', ['บันทึกเรียบร้อย']);
                return $this->redirect(['index']);
           } 
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form',[
                    'model' => $model,                
            ]);
        }
            return $this->render('_form',[
                'model' => $model,                     
            ]); 

    }

    public function actionReset_pass($id){
        // $model = User::findOne($id);
        $model = User::findOne($id);
        $model->password_hash = Yii::$app->security->generatePasswordHash('password');
        $model->updated_at = date("Y-m-d H:i:s");
        if($model->save()){
            Yii::$app->session->setFlash('success', ['บันทึกเรียบร้อย']);
            return $this->redirect(['index']);
       }else{
        Yii::$app->session->setFlash('error', ['ไม่สามารถบันทึก']);
            return $this->redirect(['index']);
       } 
        
    }
    public function actionDel($id){
        // $model = User::findOne($id);
        $model = User::findOne($id);        
        $model->status = 0;        
        $model->updated_at = date("Y-m-d H:i:s");

        $modelProfile = Profile::find()->where(['user_id' => $model->id])->one();
        $modelProfile->status = 0;
        $modelProfile->updated_at = date("Y-m-d H:i:s");

        if($model->save() && $modelProfile->save()){
            $modelLog = new Log();
            $modelLog->user_id = Yii::$app->user->identity->id;
            $modelLog->manager = 'User_DisActive';
            $modelLog->detail = 'Set DisActive '.$modelProfile->fname.$modelProfile->name.' '.$modelProfile->sname.' UserId : '.$id. ' ProfileId : '.$modelProfile->id ;
            $modelLog->create_at = date("Y-m-d H:i:s");
            $modelLog->ip = Yii::$app->getRequest()->getUserIP();
            $modelLog->save();
        }
        return $this->redirect(['index']);
    }

    public function actionActive($id){
        // $model = User::findOne($id);
        $model = User::findOne($id);
        $model->status = 10;
        $model->updated_at = date("Y-m-d H:i:s");

        $modelProfile = Profile::find()->where(['user_id' => $model->id])->one();
        $modelProfile->status = 10;
        $modelProfile->updated_at = date("Y-m-d H:i:s");

        if($model->save() && $modelProfile->save()){
            $modelLog = new Log();
            $modelLog->user_id = Yii::$app->user->identity->id;
            $modelLog->manager = 'User_Active';
            $modelLog->detail = 'Set Active '.$modelProfile->fname.$modelProfile->name.' '.$modelProfile->sname.' UserId : '.$id. ' ProfileId : '.$modelProfile->id ;
            $modelLog->create_at = date("Y-m-d H:i:s");
            $modelLog->ip = Yii::$app->getRequest()->getUserIP();
            $modelLog->save();
        }
        return $this->redirect(['index_dis']);
    }

    public function actionUpdate_profile($id){        
        
        $mdProfile = Profile::find()->where(['user_id' => $id])->one();
        
        $filename = $mdProfile->img;

        if ($mdProfile->load(Yii::$app->request->post())) {
            $f = UploadedFile::getInstance($mdProfile, 'img');

            if(!empty($f)){
                
                $dir = Url::to('@webroot/uploads/user/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }                
                if($filename && is_file($dir.$filename)){
                    unlink($dir.$filename);// ลบ รูปเดิม;   
                }
                $fileName = md5($f->baseName . time()) . '.' . $f->extension;
                if($f->saveAs($dir . $fileName)){
                    $mdProfile->img = $fileName;
                }
                if($mdProfile->save()){
                    Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                };   
                return $this->redirect(['index']);                            
            }
            $mdProfile->img = $filename;
            $mdProfile->fname = $_POST['Profile']['fname'];
            $mdProfile->name = $_POST['Profile']['name'];
            $mdProfile->sname = $_POST['Profile']['sname'];
            $mdProfile->id_card = $_POST['Profile']['id_card'];
            $mdProfile->dep = $_POST['Profile']['dep'];
            $mdProfile->address = $_POST['Profile']['address'];
            $mdProfile->phone = $_POST['Profile']['phone'];
            if($mdProfile->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            };          
            return $this->redirect(['index']);
        }
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form_edit_profile_admin',[
                    'model' => $mdProfile,                    
            ]);
        }
        
        return $this->render('_form_edit_profile_admin',[
               'model' => $mdProfile,                    
        ]);
    }


    public function actionProfile(){
        $mdUser = User::findOne(Yii::$app->user->id);
        $mdProfile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();   
        
        $modelLogs = Log::find()
                        ->where(['user_id' => Yii::$app->user->id])
                        ->orderBy([
                            'create_at'=>SORT_DESC,
                            'id' => SORT_DESC,
                            ])
                        ->limit(50)
                        ->all();        
        

        return $this->render('profile',[
            'mdProfile' => $mdProfile,
            'mdUser' => $mdUser,
            'modelLogs' => $modelLogs
            ]);
    }

    public function actionShow_profile($id){
        $mdUser = User::findOne($id);
        $mdProfile = Profile::find()->where(['user_id' => $mdUser->id])->one();       

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('show_profile',[
                'mdProfile' => $mdProfile,
                'mdUser' => $mdUser                    
            ]);
        }        
        return $this->render('show_profile',[
            'mdProfile' => $mdProfile,
            'mdUser' => $mdUser                    
        ]);
    }

    public function actionEdit_img($id=null){        
        if($id == ''){
            $mdProfile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        }else{
            $mdProfile = Profile::find()->where(['user_id' => $id])->one();
        }

        $filename = $mdProfile->img;

        if ($mdProfile->load(Yii::$app->request->post())) {
            $f = UploadedFile::getInstance($mdProfile, 'img');

            if(!empty($f)){
                
                $dir = Url::to('@webroot/uploads/user/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }                
                if($filename && is_file($dir.$filename)){
                    unlink($dir.$filename);// ลบ รูปเดิม;   
                }
                $fileName = md5($f->baseName . time()) . '.' . $f->extension;
                if($f->saveAs($dir . $fileName)){
                    $mdProfile->img = $fileName;
                }
                if($mdProfile->save()){
                    Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                };   
                return $this->redirect(['profile']);                            
            }
            $mdProfile->img = $filename;
            if($mdProfile->save()){
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
            };          
            return $this->redirect(['profile']);
        }
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('edit_img',[
                    'model' => $mdProfile,                    
            ]);
        }
        
        return $this->render('edit_img',[
               'model' => $mdProfile,                    
        ]);
    }

    public function actionChang_pass($id = null){
        if($id == ''){
            $mdUser = User::findOne(Yii::$app->user->id);
            $mdProfile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        }else{
            $mdUser = User::findOne($id);
        }

        $pass = $mdUser->password_hash;

        // if(!($pass == Yii::$app->security->generatePasswordHash('password'))){
        //     Yii::$app->session->setFlash('success', 'ไม่สามารถเปลี่ยน Password ได้');
        //     return $this->redirect(['profile']); 
        // }

        if ($mdUser->load(Yii::$app->request->post())) {
            if($_POST['User']['password_hash'] == $pass){
                return $this->redirect(['profile']);
            }
            if(!($_POST['User']['password_hash'] == '' )){
                $mdUser->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
                if($mdUser->save()){
                    Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                }; 
            }  
            return $this->redirect(['profile']);              
                                
        }
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form_chang_pass',[
                    'model' => $mdUser,                    
            ]);
        }
        
        return $this->render('_form_chang_pass',[
               'model' => $mdUser,                    
        ]);
    }

    public function actionChang_email($id = null){
        if($id == ''){
            $mdUser = User::findOne(Yii::$app->user->id);
        }else{
            $mdUser = User::findOne($id);
        }
        
        if(Yii::$app->request->isAjax && $mdUser->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($mdUser);
        }

        if ($mdUser->load(Yii::$app->request->post())) {
                $mdUser->email = $_POST['User']['email'];
               
                if($mdUser->save()){
                    Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                }else{
                    Yii::$app->session->setFlash('error', 'ไม่สำเร็จ');
                } 
              
            return $this->redirect(['profile']);   
                                   
        }
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form_chang_email',[
                    'model' => $mdUser,                    
            ]);
        }
        
        return $this->render('_form_chang_email',[
               'model' => $mdUser,                    
        ]);
    }

    public function actionEdit_profile($id=null){
        
        if($id == ''){
            $mdProfile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        }else{
            $mdProfile = Profile::find()->where(['user_id' => $id])->one();
        }

        if(Yii::$app->request->isAjax && $mdProfile->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($mdProfile->load(Yii::$app->request->post())) {
            $mdProfile->fname = $_POST['Profile']['fname'];
            $mdProfile->name = $_POST['Profile']['name'];
            $mdProfile->sname = $_POST['Profile']['sname'];
            $mdProfile->id_card = $_POST['Profile']['id_card'];
            $mdProfile->dep = $_POST['Profile']['dep'];
            $mdProfile->address = $_POST['Profile']['address'];
            $mdProfile->phone = $_POST['Profile']['phone'];
                 if($mdProfile->save()){
                    Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                }else{
                    Yii::$app->session->setFlash('error', 'ไม่สำเร็จ');
                } 
           
            return $this->redirect(['profile']); 
        }
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form_edit_profile',[
                    'model' => $mdProfile,                    
            ]);
        }
        
        return $this->render('_form_edit_profile',[
               'model' => $mdProfile,                    
        ]);
    }
}