<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "slip_user".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_type
 * @property string $status
 */
class SlipUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slip_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'],'unique','message'=>'ชื่อนี้มีแล้ว.'],
            // [['user_id'], 'integer'],
            // [['user_type', 'status'], 'string', 'max' => 255],
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
            'user_type' => 'User Type',
            'status' => 'ลำดับ',
        ];
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }

    public function getProfileName(){
        $model=$this->profile;
        return $model ? $model->fname.$model->name.' '.$model->sname : '-';
    }

    public function getProfileImg(){
        $model=$this->profile;
        return $model ? $model->img : 'nopic.png';
    }

    public function getProfileList(){
        // $modelSU = SlipUser::find()->all();
        $models = Profile::find()->where([
            'status' => 10
            ])->all();
       
        foreach($models as $model){            
            
                $model->name = $model->fname.$model->name.' '.$model->sname;
                    
        }
        return ArrayHelper::map($models,'user_id','name');
    }
}
