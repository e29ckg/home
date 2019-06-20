<?php
use yii\helpers\Html;

?>
<?php 

use Da\QrCode\QrCode;

use Da\QrCode\Format\PhoneFormat; 

$format = new PhoneFormat(['phone' => 0657657657]);
// $sms_qr = 'http://www.google.com';
$qrCode = (new QrCode($format))
    ->setSize(250)
    ->setMargin(5)
    ->useForegroundColor(51, 153, 255);

// now we can display the qrcode in many ways
// saving the result to a file:

// $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified

// display directly to the browser 
// header('Content-Type: '.$qrCode->getContentType());
// echo $qrCode->writeString();

?> 

<?php 
// or even as data:uri url
echo '<img src="' . $qrCode->writeDataUri() . '">';
echo Url::to('@webroot/uploads/bila/'.$model->user_id.'/'.$model->id.'/'.$model->id.'.png');
?>

<table width="100%">
    <tr>
        <td width="100%" style="text-align: right">
            <h4>รหัสใบเบิก </h4>            
        </td>
        
    </tr>
    <tr>
    <td width="100%" style="text-align: right">
            <h5></h5>            
        </td>
        </tr>
</table>
<table width="100%">
    <tr>
        <td colspan="2" width="80%">
            <h3>ผู้เบิก : </h3>
        </td>
        <td colspan="2" width="80%">
            
        </td>
    </tr>
</table>
<br>
<table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
    <thead>
		<tr class="cart_menu">
	    	<th class="image">ลำดับ<br>no.</th>
			<th class="description">รายการ</th>
			<th class="price">ราคาต่อหน่วย</th>
			<th class="quantity">จำนวน</th>
			<th class="total">ราคารวม<br>Total</th>
		</tr>
	</thead>
    <tbody>
        <?php $i = 1;
                $total = 0;
                $totalSum = 0;
                ?>
        
            <tr>
                <td><?=$i?></td>
                <td>
                    
                </td>
                <td></td>
                <td></td>
                <td>
                
                </td>
            </tr>
            <?php $totalSum = $totalSum + $total;
            $i++;
            ?>
          
    </tbody>
    <tbody>
        <?php for($i;$i<=10;$i++){ ?>         
            <tr>
                <td><?=$i?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php  } ?>    
    </tbody>
</table>
<table cellspacing="0" cellpadding="2" border="0" width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <table cellspacing="0" cellpadding="0" class="table_bordered" width="100%">
                <tr>
                    <td colspan="2" width="50%">
                        <u>ราคารวม :</u><br />
                        Total
                    </td>
                    <td colspan="2" width="50%">
                        <h3><?=$totalSum?></h3>
                    </td>
                </tr>                
            </table>
        </td>        
    </tr>
</table>

<table cellspacing="0" cellpadding="2" border="0" width="100%" style= "margin-top: 50px">
    <tr>
        <td width="">ผู้เบิก...............................................................</td>
        <td width="50%">ผู้อนุมัติ...........................................................</td>        
    </tr>
</table>
    <table cellspacing="0" cellpadding="2" border="0" width="100%" style= "margin-top: 75px">
    <tr>
        <td width="50%">ผู้จ่าย............................................................</td>
        <td width="50%">ผู้รับของ..........................................................</td>        
    </tr>
</table>
