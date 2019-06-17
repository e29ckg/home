<?php

namespace app\controllers;

use Yii;
use app\models\CLetter;
use app\models\log;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

use app\models\SignupForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use yii\widgets\ActiveForm;

class SiteController extends Controller
{
    
    /** {@inheritdoc}
     **/
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //s$this->layout = 'loginl';
        // return $this->render('index');
        return $this->redirect(['main']);
    }

    public function actionMain()
    {
        $model = CLetter::find()->orderBy([
            // 'created_at'=>SORT_ASC,
            'id' => SORT_DESC,
            ])->limit(50)->all();
    
        $countAll = CLetter::getCountAll();
    
        return $this->render('main',[
            'models' => $model,
            'countAll' => $countAll,
        ]);
    }
    public function actionAll()
    {
        $model = CLetter::find()->orderBy([
            // 'created_at'=>SORT_ASC,
            'id' => SORT_DESC,
            ])
            // ->limit(10)
            ->all();
        
            $countAll = CLetter::getCountAll();
        
        return $this->render('main',[
            'models' => $model,
            'countAll' => $countAll,
        ]);

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
   
    public function actionRegister()
    {
        $this->layout = 'blank';

        $uname = (isset($_POST['username'] ))?$_POST['username'] : 'NULL';
        echo '<script type="text/javascript">alert("' . $uname. '")</script>';
        return $this->render('register',['uname' => $uname]);
       
    }

    public function actionLogin()
    {        

        $this->layout = 'loginl';

        if (!Yii::$app->user->isGuest) {
            // return $this->goHome();
            return $this->redirect('site/index');
        }
        
        
        $model = new LoginForm();        

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $message = Cletter::getProfileName(Yii::$app->user->identity->id) .' เข้าสู่ระบบ';
            $modelLog = new Log();
            $modelLog->user_id = Yii::$app->user->identity->id;
            $modelLog->manager = 'Login';
            $modelLog->detail = 'เข้าสู่ระบบ';
            $modelLog->create_at = date("Y-m-d H:i:s");
            $modelLog->ip = Yii::$app->getRequest()->getUserIP();
            if($modelLog->save()){
                
                $res = Cletter::notify_message_admin($message); 
            }
            return $this->goBack();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
        
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $modelLog = new Log();
        $message = Cletter::getProfileName(Yii::$app->user->identity->id) .' ออกจากสู่ระบบ';
            $modelLog->user_id = Yii::$app->user->identity->id;
            $modelLog->manager = 'LogOut';
            $modelLog->detail = 'ออกจากสู่ระบบ';
            $modelLog->create_at = date("Y-m-d H:i:s");
            $modelLog->ip = Yii::$app->getRequest()->getUserIP();
            if($modelLog->save()){
                Yii::$app->user->logout();
                $res = Cletter::notify_message_admin($message); 
            }

        // Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@admin.com';
            $user->role = '9';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good <a href=index?r=site>Let\'s Go</a>';

            }
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
 
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
 
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
 
        }
 
        return $this->render('passwordResetRequestForm', [
            'model' => $model,
        ]);
    }
 
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token){
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
 
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }
 
        return $this->render('passwordResetRequestForm', [
            'model' => $model,
        ]);
      }

    public function actionHello() {
        $message = date('Y-m-d H:i:s');
        $message .= ' Hi->';
        $message .= Yii::$app->getRequest()->getUserIP();        
        
        $res = $this->notify_message($message);    
                
        return $this->redirect('index');
        
    }
    
    //ส่งข้อความผ่าน line Notify
    public function notify_message($message) {
        $line_api = 'https://notify-api.line.me/api/notify';
        // $line_token = 'FVJfvOHD7nkd9mSTxN5573tVSpVuiK8JTEAIgSAOYZx'; //แบบแซบ
        $line_token = 'FHuxAelw65wEhUAF2W1kiDnX2FchZJdeqW6mQRFcIl2'; //pk-test
        // $line_token = '4A51UznK0WDNjN1W7JIOMyvcsUl9mu7oTHJ1G1u8ToK'; //ศยจ.ประจวบฯแจ้งทราบ
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $line_token . "\r\n" . "Content-Length: "
                . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }
    
}
