<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "web_link".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $img
 * @property string $create_at
 */
class WebLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name' , 'link'], 'required'],
            [['name' , 'link'],'unique','message'=>'Name already exist. Please try another one.'],            
            [['create_at'], 'safe'],
            [['name', 'img', 'link'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'png, jpg', 'maxSize'=> 1024 * 1024 * 5],
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
            'link' => 'link',
            'img' => 'Img',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    public function getCountAll()
    {        
        return  WebLink::find()->count();           
    }

    public function getWebLinkFile()
    {
        // return $this->hasOne(WebLinkFile::className(), ['web_link_id' => 'id']);
        return $this->hasMany(WebLinkFile::className(), ['web_link_id' => 'id']);
    }
}
