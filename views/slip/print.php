<?php
use yii\helpers\Url;
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
<center><img src="images/coj_vector.gif" width='70'></center>
<p class="thsarabunnew" align='center'><b>สำนักงานประจำศาลเยาวชนและครอบครัวจังหวัดร้อยเอ็ด<br>ประจำเดือน<?= $model->slip_month .' '.$model->slip_year ?>
<br>ชื่อ : <?=$model->user_id ?></b></p><br>


<?php
//รวมรายรับ
// $reciveall=$model['slip_salary']+$model['slip_salary2']+$model['slip_position']+$model['slip_position2']+$model['slip_special']+$model['slip_special2']+$model['slip_spem']+$model['slip_spem2']+$model['slip_ptk']+$model['slip_ptk2']+$model['slip_future']+$model['slip_future2']+$model['slip_full'];
//รวมรายจ่าย
// $payall=$model['slip_juscoop']+$model['slip_tax']+$model['slip_cremation']+$model['slip_aia']+$model['slip_kasikorn']+$model['slip_aom']+$model['slip_justice']+$model['slip_kbk']+$model['slip_kbk2'];
//คงเหลือสุทธิ
// $amounts=$reciveall-$payall;

//ข้าราชการ
// if($model['user_option']==1){
    if(1){
?>
    <center>
    <table class="thsarabunnew">
    
        <tr>
            <th align='left' width=200>เงินเดือน</th>
            <th align='right'><?= $model['slip_salary'] ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>สหกรณ์ฯ</th>
            
        </tr>

        <tr>
            <th align='left'  width=200>เงินประจำตำแหน่ง</th>
            <th align='right'></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ภาษี</th>
            <th align='right'><?=$model['slip_tax'] ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนรายเดือนข้าราชการ</th>
            <th align='right'><?=$model['slip_special'] ?></th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='left'  width=200>ฌศย.ศาลฯ</th>
            <th align='right'><?= $model['slip_cremation'] ?></th>
        </tr>

        <tr>
            <th align='left'  width=200>ค่าตอบแทนพิเศษ</th>
            <th align='right'><?= $model['slip_spem']?></th>
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
        if(1){
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
            <th align='left'  width=200>กบข.</th>
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
        if($model['slip_ptk']!==0){
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
            <th align='right'><?= '..' ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            <th align='center'  width=200><b>รวมรายจ่าย : </b></th>
            <th align='right'><?= '..'?></tr>

    </table>
    <p class="thsarabunnew"><b>คงเหลือสุทธิ : <u><?php// haiBahtConversion("$amounts")?>)</b></p>
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
    <p class="thsarabunnew"><b>คงเหลือสุทธิ : <u><?= $amounts?>, '.', '')?><cho ThaiBahtConversion("$amounts")?>)</b></p>
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