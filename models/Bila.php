<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bila".
 *
 * @property int $id
 * @property int $user_id
 * @property string $cat
 * @property string $date_begin
 * @property string $date_end
 * @property string $date_total
 * @property string $dateO_begin
 * @property string $dateO_end
 * @property string $dateO_total
 * @property string $address
 * @property string $t1
 * @property string $t2
 * @property string $t3
 * @property string $po
 * @property string $bigboss
 * @property string $date_create
 */
class Bila extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bila';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date_begin', 'date_end', 'date_total','t1'], 'required'],
            [['user_id','p1','dateO_total','date_total', 't1'], 'integer'],
            [['t3','p2'], 'safe'],
            [['cat', 'date_begin', 'comment','date_end', 'dateO_begin', 'dateO_end', 'due', 'address', 't2', 'po', 'bigboss', 'date_create'], 'string', 'max' => 255],
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
            'cat' => 'ประเภทการลา',
            'p1' => 'มีวันลาพักผ่อนสะสม',
            'p2' => 'พักผ่อนสะสมรวม',
            'date_begin' => 'ลาตั้งแต่วันที่',
            'date_end' => 'ถึงวันที่',
            'date_total' => 'มีกำหนด(วัน)',
            'due' => 'เนื่องจาก',
            'dateO_begin' => 'ลาครั้งสุดท้าย ตั้งแต่วันที่',
            'dateO_end' => 'ถึงวันที่',
            'dateO_total' => 'มีกำหนด(วัน)',
            'address' => 'ระหว่างลาติดต่อได้ที่',
            't1' => 'เคยลามาแล้วรวม',
            't2' => 'T2',
            't3' => 'T3',
            'comment' => 'หมายเหตุ',
            'po' => 'Po',
            'bigboss' => 'Bigboss',
            'date_create' => 'Date Create',
        ];
    }
    public function getCountAll()
    {        
        return Bila::find()->count();           
    }
}
