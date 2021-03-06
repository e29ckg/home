<?php

namespace app\models;
use yii\helpers\Html;
use yii\helpers\Url;
use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $user_id
 * @property string $fname
 * @property string $name
 * @property string $sname
 * @property string $photo
 * @property string $birthday
 * @property int $idc
 * @property string $dep
 * @property string $address
 * @property string $tel
 * @property int $created_at
 * @property int $updated_at
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','sname'], 'required'],
            // [['birthday'], 'safe'],
            // // [['created_at', 'updated_at'], 'integer'],
            // [['img', 'dep', 'address', 'phone'], 'string', 'max' => 255],
            // [['fname'], 'string', 'max' => 25],
            // [['name', 'sname'], 'string', 'max' => 50],
            // [['name','id_card'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'fname' => 'คำนำหน้าชื่อ',
            'name' => 'ชื่อ',
            'sname' => 'นามสกุล',
            'img' => 'รูปภาพ',
            'birthday' => 'วันเกิด',
            'id_card' => 'เลขบัตรประชาชน',
            'dep' => 'ตำแหน่ง',
            'address' => 'ที่อยู่',
            'phone' => 'เบอร์โทรศัพท์',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getFullName()
    {
        if (!Yii::$app->user->isGuest){
            $model = Profile::findOne(['user_id'=> Yii::$app->user->identity->id]);   
            return $model->user_id ? $model->fname.$model->name.' '.$model->sname : 'No_Name';                   
        }
        return 'Guest ';
    }   

    public function getFullNameId($id)
    {
            $model = Profile::findOne(['user_id'=> $id]);   
            return $model->user_id ? $model->fname.$model->name.' '.$model->sname : 'No_Name';                   
            // return $model;                   
        
    }
    
    public function getImgSrc()
    {
        if (!Yii::$app->user->isGuest){
            $model = Profile::findOne(['user_id'=> Yii::$app->user->identity->id]);   
            return $model->img ? Yii::getAlias('@web').'/uploads/user/'.$model->img : Yii::getAlias('@web').'/img/avatars/male.png';         
        }
        return Yii::getAlias('@web').'/img/avatars/male.png';
    }

    public function getImgById($id)
    {    
        $model = Profile::findOne(['user_id' => $id]);  
        if(isset($model->img)){
            $source = Url::to('@webroot/uploads/user/'.$model->img);
            if(is_file($source)){
                $link = 'uploads/user/'.$model->img;
                return $link ;
            }             
        }
        $link = 'img/none.png';
        return $link ;        
              
    }

    public function getDep()
    {
        $model = Profile::findOne(['user_id'=>Yii::$app->user->identity->id]);
        return $model->dep ? $model->dep : '' ;
    }

    public function getPhone()
    {
        $model = Profile::findOne(['user_id'=>Yii::$app->user->identity->id]);
        return $model->phone;
    }
}
