<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slip".
 *
 * @property int $slip_id
 * @property int $user_id
 * @property string $slip_month
 * @property string $slip_year
 * @property string $slip_bank
 * @property string $slip_salary
 * @property string $slip_salary2
 * @property string $slip_position
 * @property string $slip_position2
 * @property string $slip_special
 * @property string $slip_special2
 * @property string $slip_spem
 * @property string $slip_spem2
 * @property string $slip_ptk
 * @property string $slip_ptk2
 * @property string $slip_future
 * @property string $slip_future2
 * @property string $slip_full
 * @property string $slip_juscoop
 * @property string $slip_tax
 * @property string $slip_cremation
 * @property string $slip_aia
 * @property string $slip_kasikorn
 * @property string $slip_aom
 * @property string $slip_justice
 * @property string $slip_kbk
 * @property string $slip_kbk2
 * @property string $slip_create
 * @property string $slip_update
 */
class Slip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slip_bank','slip_salary'], 'required'],
            // [['user_id'], 'integer'],
            [['slip_bank','slip_salary','slip_salary2', 'slip_position'], 'number'],
            // [['slip_month', 'slip_year', 'slip_bank', 'slip_salary', 'slip_salary2', 'slip_position', 'slip_position2', 'slip_special', 'slip_special2', 'slip_spem', 'slip_spem2', 'slip_ptk', 'slip_ptk2', 'slip_future', 'slip_future2', 'slip_full', 'slip_juscoop', 'slip_tax', 'slip_cremation', 'slip_aia', 'slip_kasikorn', 'slip_aom', 'slip_justice', 'slip_kbk', 'slip_kbk2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slip_id' => 'Slip ID',
            'user_id' => 'User ID',
            'slip_month' => 'Slip Month',
            'slip_year' => 'Slip Year',
            'slip_bank' => 'เลขที่บัญชีที่ใช้',
            'slip_salary' => 'เงินเดือน',
            'slip_salary2' => 'เงินเดือน(ตกเบิก)',
            'slip_position' => 'เงินประจำตำแหน่ง',
            'slip_position2' => 'เงินประจำตำแหน่ง(ตกเบิก)',
            'slip_special' => 'ค่าตอบแทนนอกเหนือเงินเดือน',
            'slip_special2' => 'ค่าตอบแทนนอกเหนือเงินเดือน(ตกเบิก)',
            'slip_spem' => 'ค่าตอบแทนพิเศษ',
            'slip_spem2' => 'ค่าตอบแทนพิเศษ(ตกเบิก)',
            'slip_ptk' => 'พตก.',
            'slip_ptk2' => 'พตก.(ตกเบิก)',
            'slip_future' => 'ค่าครองชีพชั่วคราว',
            'slip_future2' => '่ค่าครองชีพชั่วคราว(ตกเบิก)',
            'slip_full' => 'ค่าตอบแทนพิเศษข้าราชการ(เต็มขั้น)',
            'slip_juscoop' => 'สหกรณ์',
            'slip_tax' => 'ภาษี',
            'slip_cremation' => 'ฌศย.ศาลฯ',
            'slip_aia' => 'A.I.A',
            'slip_kasikorn' => 'ธ.กสิกร',
            'slip_aom' => 'ฌยธ.',
            'slip_justice' => 'slip_justice',
            'slip_kbk' => 'กบข./ปกส.',
            'slip_kbk2' => 'กบข./ปกส.(ออมเพิ่ม)',
            'file' => 'file',
            'slip_create' => 'Slip Create',
            'slip_update' => 'Slip Update',
        ];
    }

    public function DateThai_full($strDate)
	{
        if($strDate == ''){
            return "-";
        }
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม",
                            "สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
    }

    public function DateThai_month_full($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม",
                            "สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strMonthThai";
    }
}
