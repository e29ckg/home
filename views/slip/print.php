<?php
use yii\helpers\Url;
use app\models\Slip;
use app\models\Profile;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ระบบพิมพ์สลิปเงินเดือน</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="stylesheet" href="<?=Url::to(['/fonts/thsarabunnew.css'])?>" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<div style="margin:20px; padding:0px 0px 0px 0px; border:0px solid #009999">
<font size='2.5'>
<center><img src="<?=Url::to(['/img/coj_vector.gif'])?>" width='70'></center>
<p class="thsarabunnew" align='center'><b>สำนักงานประจำศาลเยาวชนและครอบครัวจังหวัดร้อยเอ็ด<br>ประจำเดือน <?= Slip::DateThai_month(intval($model->slip_month)).' '.intval($model->slip_year+543)?>
<br>ชื่อ : <?= Profile::getFullNameId($model->user_id); ?></b></p><br>


<?php
//รวมรายรับ
$reciveall = (real)$model->slip_salary + (real)$model->slip_salary2 + (real)$model->slip_position 
    + (real)$model->slip_position2 + (real)$model->slip_special + (real)$model->slip_special2 
    + (real)$model->slip_spem + (real)$model->slip_spem2 + (real)$model->slip_ptk + (real)$model->slip_ptk2
    + (real)$model->slip_future + (real)$model->slip_future2 + (real)$model->slip_full;
//รวมรายจ่าย 
$payall = (real)$model->slip_juscoop + (real)$model->slip_tax + (real)$model->slip_cremation 
+ (real)$model->slip_aia + (real)$model->slip_kasikorn + (real)$model->slip_aom + (real)$model->slip_justice 
+ (real)$model->slip_kbk + (real)$model->slip_kbk2;
//คงเหลือสุทธิ
$amounts = (real)($reciveall) - (real)($payall);

//ข้าราชการ
// if($model['user_option']==1){
    if(1){
?>
    <center>
    <table class="thsarabunnew">
    
        <tr>
            <th align='left' width=200>เงินเดือน</th>
            <th align='right'><?= number_format((real)$model->slip_salary, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>สหกรณ์ฯ</th>
            <th align='right'><?= number_format((real)$model->slip_juscoop, 2   , '.'    , ','   )  ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>เงินประจำตำแหน่ง</th>
            <th align='right'><?= number_format((real)$model->slip_position, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ภาษี</th>
            <th align='right'><?= number_format((real)$model->slip_tax, 2   , '.'    , ','   )  ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนรายเดือนข้าราชการ</th>
            <th align='right'><?= number_format((real)$model->slip_special, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌศย.ศาลฯ</th>
            <th align='right'><?= number_format((real)$model->slip_cremation, 2   , '.'    , ','   )  ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ</th>
            <th align='right'><?= number_format((real)$model->slip_spem, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>A.I.A.</th>
            <th align='right'><?= number_format((real)$model->slip_aia, 2   , '.'    , ','   )  ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>พตก.</th>
            <th align='right'><?= number_format((real)$model->slip_ptk, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        <!-- ธนาคาร -->
        <?php
        if(1){
        ?>
            <th align='left'  width=200>ธนาคารกสิกร</th>
            <th align='right'><?= number_format((real)$model->slip_kasikorn, 2   , '.'    , ','   )  ?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200>ธนาคารออมสิน</th>
            <th align='right'><?= number_format((real)$model->slip_kasikorn, 2   , '.'    , ','   )  ?></th>
        <?php
        }
        ?>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าครองชีพชั่วคราว</th>
            <th align='right'><?= number_format((real)$model->slip_future, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌยธ.ยุติธรรม</th>
            <th align='right'><?= number_format((real)$model->slip_justice, 2   , '.'    , ','   )  ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษข้าราชการ(เต็มขั้น)</th>
            <th align='right'><?= number_format((real)$model->slip_full, 2   , '.'    , ','   )  ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>กบข.</th>
            <th align='right'><?= number_format((real)$model->slip_kbk, 2   , '.'    , ','   )  ?></th>
        </tr>

        <tr>
        <?php
        if((real)$model['slip_salary2']!=0){
        ?>
            <th align='left'  width=200>เงินเดือน (ตกเบิก)</th>
            <th align='right'><?= number_format((real)$model->slip_salary2, 2   , '.'    , ','   )  ?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        <!-- กบข. (ออมเพิ่ม) -->
        <?php
        if($model['slip_kbk2']!=0){
        ?>
            <th align='left'  width=200>กบข. (ออมเพิ่ม)</th>
            <th align='right'><?= number_format((real)$model->slip_kbk2, 2   , '.'    , ','   )  ?></th>
        <?php
        }else{
        ?>            
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
        </tr>

        <!-- ค่าตอบแทนพิเศษ (ตกเบิก) และ กบข. (ตกเบิก) -->
        <tr>
        <?php
        if($model['slip_spem2']!=0){
        ?>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ (ตกเบิก)</th>
            <th align='right'><?= number_format((real)$model->slip_salary2, 2   , '.'    , ','   )  ?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }if($model['slip_kbk2']!=0){
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>กบข. (ตกเบิก)</th>
            <th align='right'><?= number_format((real)$model->slip_kbk2, 2   , '.'    , ','   )  ?></th>
        <?php
        }else{
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
        </tr>

        <!-- พตก. (ตกเบิก) รายจ่างตารางว่าง -->
        <tr>
        <?php
        if((real)$model['slip_ptk2'] > 0){
            echo '
            <th align="left"  width=200>พตก. (ตกเบิก)</th>
            <th align="right">'.number_format((real)$model->slip_ptk2, 2   , '.'    , ','   ).'  ?></th>
        ';
        }else{
        echo '
            <th align="left"  width=200></th>
            <th align="right"></th>';
        
        }
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align="left"  width=200></th>
            <th align="right"></th>
        </tr>

        <!-- รวม -->
        <tr>
            <th align='center'  width=200><b>รวมรายรับ : </b></th>
            <th align='right'><?= number_format((real)$reciveall, 2   , '.'    , ','   )  ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='center'  width=200><b>รวมรายจ่าย : </b></th>
            <th align='right'><?= number_format((real)$payall, 2 , '.' , ',') ?></tr>

    </table>
    <p class="thsarabunnew"><b>คงเหลือสุทธิ : <?= number_format((real)$amounts, 2 , '.' , ',') ?> (<?= Slip::ThaiBahtConversion($amounts)?>)</b></p>
    </center>

    <p class="thsarabunnew">
    <table class="thsarabunnew" align='center'>
    
            <tr>
                <th align='center' width=300>ลงชื่อ.......................................</th>
                <th align='center'></th>
                <th align='center'  width=300>ลงชื่อ.......................................</th>
                <th align='center'></th>
            </tr>

            <tr>
                <th align='center' width=300>(นายชวลิต  บุญฤทธิ์)<br>ผู้อำนวยการฯ</th>
                <th align='center'></th>
                <th align='center'  width=300>(นางถนอมวงษ์  รอไธสง)<br>หัวหน้าการเงิน</th>
                <th align='center'></th>
            </tr>
    </table>
    </p>
    
<?php
//พนักงานราชการ
}else if($model['user_option']==2){
?>
    <center>
    <table class="thsarabunnew">
    
        <tr>
            <th align='left' width=200>ค่าตอบแทนพนักงานราชการ</th>
            <th align='right'><?= $model['slip_salary']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>สหกรณ์ฯ</th>
            <th align='right'><?= $model['slip_juscoop'] ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>เงินประจำตำแหน่ง</th>
            <th align='right'><?= $model['slip_salary2']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ภาษี</th>
            <th align='right'><?= $model['slip_tax']?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนรายเดือนข้าราชการ</th>
            <th align='right'><?= $model['slip_special']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌศย.ศาลฯ</th>
            <th align='right'><?= $model['slip_cremation'] ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ</th>
            <th align='right'><?= $model['slip_spem']?> </th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>A.I.A.</th>
            <th align='right'><?= $model['slip_aia'] ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>พตก.</th>
            <th align='right'><?= $model['slip_ptk']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        <!-- ธนาคาร -->
        <?php
        if($model['slip_kasikorn']!=0){
        ?>
            <th align='left'  width=200>ธนาคารกสิกร</th>
            <th align='right'><?= $model['slip_kasikorn']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200>ธนาคารออมสิน</th>
            <th align='right'><?= $model['slip_kasikorn']?></th>
        <?php
        }
        ?>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าครองชีพชั่วคราว</th>
            <th align='right'><?= $model['slip_future']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌยธ.ยุติธรรม</th>
            <th align='right'><?= $model['slip_justice']?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษข้าราชการ(เต็มขั้น)</th>
            <th align='right'><?= $model['slip_full']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ประกันสังคม</th>
            <th align='right'><?= $model['slip_kbk']?></th>
        </tr>

        <tr>
        <?php
        if($model['slip_salary2']!=0){
        ?>
            <th align='left'  width=200>เงินเดือน (ตกเบิก)</th>
            <th align='right'><?= $model['slip_salary2']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        <!-- กบข. (ออมเพิ่ม) -->
        <?php
        if($model['slip_kbk2']!=0){
        ?>
            <th align='left'  width=200>กบข. (ออมเพิ่ม)</th>
            <th align='right'><?= $model['slip_kbk2']?></th>
        <?php
        }else{
        ?>            
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
        </tr>

        <!-- ค่าตอบแทนพิเศษ (ตกเบิก) และ กบข. (ตกเบิก) -->
        <tr>
        <?php
        if($model['slip_spem2']!=0){
        ?>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ (ตกเบิก)</th>
            <th align='right'><?= $model['slip_salary2']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }if($model['slip_kbk2']!=0){
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>กบข. (ตกเบิก)</th>
            <th align='right'><?= $model['slip_kbk2']?></th>
        <?php
        }else{
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
        </tr>

        <!-- พตก. (ตกเบิก) รายจ่างตารางว่าง -->
        <tr>
        <?php
        if($model['slip_ptk']!=0){
        ?>
            <th align='left'  width=200>พตก. (ตกเบิก)</th>
            <th align='right'><?= $model['slip_ptk2']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200></th>
            <th align='right'></th>
        </tr>

        <!-- รวม -->
        <tr>
            <th align='center'  width=200><b>รวมรายรับ : </b></th>
            <th align='right'><?= ''?>    <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='center'  width=200><b>รวมรายจ่าย : </b></th>
            <th align='right'></tr>

    </table>
    <p class="thsarabunnew"><b>คงเหลือสุทธิ : <u><?= $amounts?>, '.', ',')?>haiBahtConversion("$amounts")?>)</b></p>
    </center>

    <p class="thsarabunnew">
    <table class="thsarabunnew" align='center'>
    
            <tr>
                <th align='center' width=300>ลงชื่อ.......................................</th>
                <th align='center'></th>
                <th align='center'  width=300>ลงชื่อ.......................................</th>
                <th align='center'></th>
            </tr>

            <tr>
                <th align='center' width=300>(นายชวลิต  บุญฤทธิ์)<br>ผู้อำนวยการฯ</th>
                <th align='center'></th>
                <th align='center'  width=300>(นางถนอมวงษ์  รอไธสง)<br>หัวหน้าการเงิน</th>
                <th align='center'></th>
            </tr>
    </table>
    </p>

<?php
}else{
?>
    <center>
    <table class="thsarabunnew">
    
        <tr>
            <th align='left' width=200>ค่าจ้างรายเดือน</th>
            <th align='right'><?= $model['slip_salary']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>สหกรณ์ฯ</th>
            <th align='right'></th>
        </tr>

        <tr>
            <th align='left'  width=200>เงินประจำตำแหน่ง</th>
            <th align='right'><?= $model['slip_salary2']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ภาษี</th>
            <th align='right'><?= $model['slip_tax']?>'h>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนรายเดือนข้าราชการ</th>
            <th align='right'><?= $model['slip_special']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌศย.ศาลฯ</th>
            <th align='right'><?= $model['slip_cremation'] ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ</th>
            <th align='right'><?= $model['slip_spem']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>A.I.A.</th>
            <th align='right'><?= $model['slip_aia']?></th>
        </tr>

        <tr>
            <th align='left'  width=200>พตก.</th>
            <th align='right'><?= $model['slip_ptk']?>, </th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        <!-- ธนาคาร -->
        <?php
        if($model['slip_kasikorn']!=0){
        ?>
            <th align='left'  width=200>ธนาคารกสิกร</th>
            <th align='right'><?= $model['slip_kasikorn']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200>ธนาคารออมสิน</th>
            <th align='right'><?= $model['slip_kasikorn']?></th>
        <?php
        }
        ?>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าครองชีพชั่วคราว</th>
            <th align='right'><?= $model['slip_future']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌยธ.ยุติธรรม</th>
            <th align='right'><?= $model['slip_justice']?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษข้าราชการ(เต็มขั้น)</th>
            <th align='right'><?= $model['slip_full']?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ประกันสังคม</th>
            <th align='right'><?= $model['slip_kbk']?> </th>
        </tr>

        <tr>
        <?php
        if($model['slip_salary2']!=0){
        ?>
            <th align='left'  width=200>เงินเดือน (ตกเบิก)</th>
            <th align='right'><?= $model['slip_salary2']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        <!-- กบข. (ออมเพิ่ม) -->
        <?php
        if($model['slip_kbk2']!=0){
        ?>
            <th align='left'  width=200>กบข. (ออมเพิ่ม)</th>
            <th align='right'><?= $model['slip_kbk2']?></th>
        <?php
        }else{
        ?>            
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
        </tr>

        <!-- ค่าตอบแทนพิเศษ (ตกเบิก) และ กบข. (ตกเบิก) -->
        <tr>
        <?php
        if($model['slip_spem2']!=0){
        ?>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ (ตกเบิก)</th>
            <th align='right'><?= $model['slip_salary2']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }if($model['slip_kbk2']!=0){
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>กบข. (ตกเบิก)</th>
            <th align='right'><?= $model['slip_kbk2']?></th>
        <?php
        }else{
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
        </tr>

        <!-- พตก. (ตกเบิก) รายจ่างตารางว่าง -->
        <tr>
        <?php
        if($model['slip_ptk']!=0){
        ?>
            <th align='left'  width=200>พตก. (ตกเบิก)</th>
            <th align='right'><?= $model['slip_ptk2']?></th>
        <?php
        }else{
        ?>
            <th align='left'  width=200></th>
            <th align='right'></th>
        <?php
        }
        ?>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200></th>
            <th align='right'></th>
        </tr>

        <!-- รวม -->
        <tr>
            <th align='center'  width=200><b>รวมรายรับ : </b></th>
            <th align='right'>     <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='center'  width=200><b>รวมรายจ่าย : </b></th>
            <th align='right'></tr>

    </table>
    <p class="thsarabunnew"><b>คงเหลือสุทธิ : <u><?= $amounts?>, '.', '')?><?= Slip::TThaiBahtConversion($amounts)?>)</b></p>
    </center>

    <p class="thsarabunnew">
    <table class="thsarabunnew" align='center'>
    
            <tr>
                <th align='center' width=300>ลงชื่อ.......................................</th>
                <th align='center'></th>
                <th align='center'  width=300>ลงชื่อ.......................................</th>
                <th align='center'></th>
            </tr>

            <tr>
                <th align='center' width=300>(นายชวลิต  บุญฤทธิ์)<br>ผู้อำนวยการฯ</th>
                <th align='center'></th>
                <th align='center'  width=300>(นางถนอมวงษ์  รอไธสง)<br>หัวหน้าการเงิน</th>
                <th align='center'></th>
            </tr>
    </table>
    </p><?php
}
?>
</div>
</body>
</html>