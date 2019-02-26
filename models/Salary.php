<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use Yii;


class Salary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            // [['user_id'],'unique','message'=>'id user already exist. Please try another one.'],            
            [['user_id', 'file'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'pdf, png, jpg', 'maxSize'=> 1024 * 1024 * 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'file' => 'file',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
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
        $models = Profile::find()->where(['status' => 10])->all();
        foreach($models as &$model){
            $model->name = $model->fname.$model->name.' '.$model->sname;
        }
        return ArrayHelper::map($models,'user_id','name');
    }

    public function getCountAll()
    {        
        return Salary::find()->count();           
    }

    public function getCountOne()
    {        
        return Salary::find()->where(['user_id' => Yii::$app->user->identity->id])->count();           
    }
    public function getMountName($M)
    {        
        $date=date_create($M); 
        // return date_format($date,"Y")+543 . date_format($date,"-m") ;  
        return date_format($date,"Y-m");           
    }
}
