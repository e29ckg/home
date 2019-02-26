<?php

namespace app\controllers;

use Yii;
use app\models\Idp;
use app\models\IdpFile;
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
use yii\db\Query;


/**
 * IdpController implements the CRUD actions for Idp model.
 */
class IdpController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create'],
                'rules' => [
                    [
                        'actions' => ['index','create'],
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
     * Lists all Idp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Idp::find()->orderBy([
            'created_at'=>SORT_ASC,
            'id' => SORT_DESC,
            ])->limit(100)->all();
        
            $countAll = Idp::getCountAll();
        
        return $this->render('index',[
            'models' => $model,
            'countAll' => $countAll,
        ]);
    }

    /**
     * Displays a single Idp model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model2 = IdpFile::find()->where(['id_idp'=> $id])->all();

        return $this->render('view', [
            'model' => $model,
            'model2' => $model2,
        ]);
    }

   

    /**
     * Creates a new Idp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Idp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form_create',[
                    'model' => $model,                
            ]);
        }

        return $this->render('_form_create',[
            'model' => $model,                   
        ]);        

    }

    public function actionAddfile($id=null){
        $model = $this->findModel($id);
        $model2 = new IdpFile();

        if(Yii::$app->request->isAjax && $model2->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model2);
        }

        if ($model2->load(Yii::$app->request->post()) && $model2->validate()) {
            
            $f = UploadedFile::getInstance($model2, 'file_path');
            if(!empty($f)){
                $dir = Url::to('@webroot/uploads/idp/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                
                if(!empty($model2->name_file)){
                    $model2->name_file = $model2->name_file;
                }else{
                    $model2->name_file = $f->baseName ;
                }

                $fileName = md5($f->baseName . time()) . '.' . $f->extension;
                if($f->saveAs($dir . $fileName)){
                    $model2->file_path = $fileName;
                }    
                $model2->id_idp = $model->id;
                $model2->created_at = time("now");
                if($model2->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }             
            } 
             
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('_form_addfile',[
                    'model' => $model,     
                    'model2' => $model2,                
            ]);
        }
        return $this->render('_form_addfile',[
            'model' => $model, 
            'model2' => $model2,                    
        ]);
    }

    /**
     * Updates an existing Idp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('update',[
                    'model' => $model,                    
            ]);
        }        
        return $this->render('update',[
               'model' => $model,                    
        ]); 
    }

    /**
     * Deletes an existing Idp model.
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
     * Finds the Idp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Idp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Idp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelFile($id)
    {
        if (($model = IdpFile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionShowfile($id) {

        $model = $this->findModelFile($id);
    
        // This will need to be the path relative to the root of your app.
        $filePath = '/web/uploads/idp';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->file_path);
        if(is_file($completePath)){
            return Yii::$app->response->sendFile($completePath, $model->file_path, ['inline'=>true]);
        }else{
            return 'No File...';
        }
    }
}
