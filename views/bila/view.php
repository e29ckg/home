<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Bila;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\WebLink */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bila', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-link-view">

    <div class="jarviswidget jarviswidget-color-greenLight jarviswidget-sortable" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
            
            data-widget-colorbutton="false"	
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true" 
            data-widget-sortable="false"
            
        -->
        <header role="heading">
            <!-- <div class="jarviswidget-ctrls" role="menu">    
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen">
                    <i class="fa fa-expand "></i>
                </a> 
            </div> -->
            <h2>
                <i class="fa-fw fa fa-check"></i>
                <strong>เลขที่ </strong> <?= $model->id ?>
            </h2>				
            
        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">
            
            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
                
            </div>
            <!-- end widget edit box -->
            
            <!-- widget content -->
            <div class="widget-body">
                
                <h2 class="alert alert-success fade in">
                    
                    <?= User::getProfileNameById($model->user_id);?> 
                    <sup class="badge bg-color-orange bounceIn animated"><?= $model->cat ?></sup>                    
                </h2>
                <!-- <h2><?= $model->cat ?></h2> -->

    <table class="table table-bordered table-condensed">
      
			<tr>
                <td class="text-right">
                    รหัสใบลา
                </td>
                <td>
                    <?= $model->id ?>
                </td>
            </tr>
            <tr>   
                <td class="text-right">
                    ชื่อ
                </td>
                <td>
                    <?= User::getProfileNameById($model->user_id);?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    ตำแหน่ง
                </td>
                <td>
                    <?=User::getProfileDepById($model->user_id);?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    ประเภทการลา
                </td>
                <td>
                    <?= $model->cat ?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    จำนวนวันที่ลา
                </td>
                <td>
                    <?= $model->date_total ;?> วัน
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    ตั้งแต่วันที่
                </td>
                <td>
                    <?= Bila::DateThai_full($model->date_begin);?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    ถึงวันที่
                </td>
                <td>
                    <?= Bila::DateThai_full($model->date_end);?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    
                </td>
                <td>
                    <a href="<?=Url::to(['bila/print1','id' => $model->id])?>" class="btn btn-primary btn-xs" target="_blank" data-id=<?=$model->id?>>print</a> 
                </td>
            </tr>
        
        </table>
    
            </div>
            <!-- end widget content -->
            
        </div>
        <!-- end widget div -->
        
    </div>
</div>
