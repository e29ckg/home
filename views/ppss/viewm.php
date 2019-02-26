<?php
use yii\helpers\Url;
?>

<div class="box-body">
    <table class="table table table-bordered table-hover table-striped">
        <tbody><tr>
                <th style="width: 10px">ลำดับ</th>
                <th class="text-center">วันที่</th>
                <th class="text-center">เรื่อง</th>
                <th class="text-center" style="width: 200px">ผู้ส่ง</th>
                <th class="text-center" style="width: 200px">ดาว์โหลด</th>
            </tr>
<?php $i = 1; ?>
            <?php foreach ($All as $ppss): ?>
                <tr>
                    <td class="text-center" ><?= $i ?></td>
                    <td class="text-center" ><?= $ppss->create_at ?></td>
                    <td class="text-center" >
                    <?php 
                        if (!empty($ppss->file)){
                            $filename = Url::to('@webroot/uploads/ppss/').$ppss->file;
                            if (is_file($filename)) {                                
                                echo '<a href="?r=ppss/show&id='.$ppss->id.'" class="panel-title-right" target="_blank">คำพิพากษา <i class="fa fa-file-pdf-o"></i></a> ';
                            }   
                        }
                        if (!empty($ppss->file2)){
                            $filename = Url::to('@webroot/uploads/ppss/').$ppss->file2;
                            if (is_file($filename)) {                                
                                echo ' :+: <a href="?r=ppss/show2&id='.$ppss->id.'" class="panel-title-right" target="_blank">ร่าง<i class="fa fa-file-pdf-o"></i></a> ';
                            }   
                        }
                    ?>
                    </td>
                    <td class="" >
                        <?= $ppss->getProfileName(); ?>
                    </td>
                    <th class="text-center" style="width: 200px">
                    <?php 
                        if (!empty($ppss->file)){
                            $filename = Url::to('@webroot/uploads/ppss/').$ppss->file;
                            if (is_file($filename)) {                                
                                echo '<a href="?r=ppss/download_file&file_name='.$ppss->file.'&i='.$i.'&name_save='.$ppss->name.'-คำพิพากษา"> คำพิพากษา</a>';
                            }   
                        }
                        echo ' :+: ';
                        if (!empty($ppss->file2)){
                            $filename = Url::to('@webroot/uploads/ppss/').$ppss->file2;
                            if (is_file($filename)) {                                
                                echo '<a href="?r=ppss/download_file&file_name='.$ppss->file2.'&i='.$i.'&name_save='.$ppss->name.'-ร่าง">ร่าง</a>';
                            }   
                        }
                    ?>
                    </th>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div>
<a href="?r=ppss/print&id=<?=$id?>" target="_blank">พิมพ์รายงาน<a>
</div>

