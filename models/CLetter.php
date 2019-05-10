<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
// use app\models\CLetterCaid;

/**
 * This is the model class for table "c_letter".
 *
 * @property int $id
 * @property string $name
 * @property int $caid
 * @property string $file
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class CLetter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_letter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'caid'], 'required'],
            [['caid', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'file'], 'string', 'max' => 255],
            [['name'], 'unique','message'=>'Name already exist. Please try another one.'],
            [['file'], 'file', 'extensions' => 'pdf, png, jpg', 'maxSize'=> 1024 * 1024 * 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อเรื่อง',
            'caid' => 'ประเภทเอกสาร',
            'file' => 'File',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getCountAll()
    {        
        return CLetter::find()->count();           
    }

    public function getCLetterCaid()
    {
        return $this->hasOne(CLetterCaid::className(), ['id' => 'caid']);
    }

    public function getCaidName(){
        $model=$this->cLetterCaid;
        return $model ? $model->name : '';
    }

    public function getProfileName($id)
    {
        $model = Profile::find()->where(['user_id' => $id])->one();

        return $model->name ? $model->fname.$model->name.' '.$model->sname : $id ;
    }

    public function getCaidList(){
        $model = CLetterCaid::find()->select('id, name')->orderBy('id')->all();
        return ArrayHelper::map($model,'id','name');
    }
}
