<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "web_link_file".
 *
 * @property int $id
 * @property int $web_link_id
 * @property string $name
 * @property string $type
 * @property string $file
 * @property int $sort
 */
class WebLinkFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_link_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['web_link_id'], 'required'],
            [['web_link_id', 'sort'], 'integer'],
            [['name', 'type', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'web_link_id' => 'Web Link ID',
            'name' => 'Name',
            'type' => 'Type',
            'file' => 'File',
            'sort' => 'Sort',
        ];
    }
}
