<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leaves".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date_write
 * @property string $catalog_name
 * @property string $due
 * @property string $date_start
 * @property string $date_end
 * @property string $date_total
 * @property string $dateOld_start
 * @property string $dateOld_end
 * @property string $dateOld_total
 * @property string $address
 * @property string $vtotal_a
 * @property string $vtotal_b
 * @property string $vtotal_c
 */
class Leaves extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leaves';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date_write', 'catalog_name', 'due', 'date_start', 'date_end', 'date_total', 'dateOld_start', 'dateOld_end', 'dateOld_total', 'address', 'vtotal_a', 'vtotal_b', 'vtotal_c'], 'required'],
            [['user_id'], 'integer'],
            [['date_write', 'date_start', 'date_end', 'dateOld_start', 'dateOld_end'], 'safe'],
            [['catalog_name', 'date_total', 'dateOld_total', 'vtotal_a', 'vtotal_b', 'vtotal_c'], 'string', 'max' => 50],
            [['due', 'address'], 'string', 'max' => 255],
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
            'date_write' => 'Date Write',
            'catalog_name' => 'Catalog Name',
            'due' => 'Due',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'date_total' => 'Date Total',
            'dateOld_start' => 'Date Old Start',
            'dateOld_end' => 'Date Old End',
            'dateOld_total' => 'Date Old Total',
            'address' => 'Address',
            'vtotal_a' => 'Vtotal A',
            'vtotal_b' => 'Vtotal B',
            'vtotal_c' => 'Vtotal C',
        ];
    }
}
