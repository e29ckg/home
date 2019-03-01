<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii2mod\alert\Alert;
use yii\helpers\Url;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- MAIN CONTENT -->
<?php
	// print_r($models);
	// echo Yii::$app->security->generatePasswordHash('admin').'<br>';
	// echo md5('admin').'<br>';
?>

<div class="row">				
				<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
		<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-puzzle-piece"></i> App Views 
			<span>  </span>
		</h1>
		</div>
				<!-- end col -->
				
		<!-- right side of the page with the sparkline graphs -->
		<!-- col -->
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<!-- sparks -->
			<ul id="sparks">
				<li class="sparks-info">

					<h5>
					<?= Html::a('All User', ['user/index']) ?><span class="txt-color-blue"><?=$userAll?></span></h5>
					<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
									
					</div>
				</li>
				<li class="sparks-info">
					<h5><?= Html::a('Disable User', ['user/index_dis']) ?> <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;<?=$userDis?></span></h5>
					<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
									
					</div>
					</li>
					<li class="sparks-info">
					<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
					<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
									
					</div>
				</li>
			</ul><!-- end sparks -->
		</div><!-- end col -->
				
	</div>
	
	<!-- end row -->
	<section id="widget-grid" class="">
	    <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              	<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
						<header>
							<span class="widget-icon"> <i class="fa fa-table"></i> </span>
							<h2><?= $this->title;?> </h2>
						</header>
						<!-- widget div-->
						<div>
							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
				
							</div>
							<!-- end widget edit box -->
				
							<!-- widget content -->
							<div class="widget-body no-padding">
				
								<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
                                        
                                    <thead>			                
                                        <tr>
                                            <th data-hide="phone">ID</th>											
                                            <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
											<th data-hide="phone">Username</th>
                                            <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Phone</th>
											<th data-hide="phone,tablet">City</th>
										</tr>
                                    </thead>                                        
                                    <tbody>
                                    	<?php foreach ($models as $model): ?>
										<tr>
                       						<td class="text-center" ><?=$model->id ?></td>		
											<td class="text-center" >
											<?php
												if (!empty($model->getProfileImg())){
													echo '<a data-id="'.$model->id.'" href="javascript:void(0);" class="act-show">'.Html::img('@web/uploads/user/'.$model->getProfileImg(), ['alt' => 'My logo1','height'=>'42']).'</a>';													
												
												}else{
													echo '<a data-id="'.$model->id.'" href="javascript:void(0);" class="act-show">'.Html::img('@web/img/none.png', ['alt' => 'My logo','height'=>'42']).'</a>';
												}
											?>
											</td>									
                       						<td >
											   	<?= $model->getProfileName() ?> 
												<?= Html::a($model->username.'<i class="fa fa-gear fa-lg"></i>', '#', [
													'class' => 'act-view btn txt-color-greenLight btn-default btn-xs',
													'data-id' => $model->id,
													]) ?>
											   	<a class="act-view btn txt-color-greenLight btn-default btn-xs" data-id="<?=$model->id?>"><?=$model->username ?> <i class="fa fa-gear fa-lg"></i></a> 
												   <?= Html::a('resetPassword', ['user/reset_pass', 'id' => $model->id], [
													   'class' => 'btn txt-color-greenLight btn-xs',
														   'data-confirm'=>'Are you sure to ยกเลิก this item?']) 
													?>
											</td>											
                       						<td><?= $model->getProfilePhone()?></td>
                                            <td>
												<?= Html::a('แก้ไข', ['user/profile', 'id' => $model->id], ['class' => 'btn btn-info btn-xs']) ?>
												<?= Html::a('ระงับ', ['user/del', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs','data-confirm'=>'Are you sure to ยกเลิก this item?']) ?>
												<a href="index.php?r=user/profile&id=<?=$model->id?>" class="btn btn-info btn-xs">แก้ไข </a> 
												<a href="index.php?r=user/del&id=<?=$model->id?>" data-confirm="Are you sure to ยกเลิก this item?" class="btn btn-danger btn-xs"> ระงับ</a> 
											</td>
                                        </tr>
                                    	<?php  endforeach; ?>
                                    </tbody>
                            	</table>
                        	</div>
                    	</div>
					</div>
            </article>
        </div>
    </section>

</div>
<!-- END MAIN CONTENT -->



<?php
$script = <<< JS

$('#eg8').click(function() {
		
        $.smallBox({
            title : "James Simmons liked your comment",
            content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
            color : "#296191",
            iconSmall : "fa fa-thumbs-up bounce animated",
            timeout : 4000
        });

    });



     
$(document).ready(function() {

	function init_click_handlers(){        	
		
		var url_update = "update";
    	$(".act-update").click(function(e) {            
			var fID = $(this).data("id");
			// alert(fID);
        	$.get(url_update,{id: fID},function (data){
            	$("#activity-modal").find(".modal-body").html(data);
            	$(".modal-body").html(data);
            	$(".modal-title").html("แก้ไขข้อมูลสมาชิก");
            	$("#activity-modal").modal("show");
        	});
    	});

		var url_line = "line_alert";		
    	$(".act-line").click(function(e) {			
                var fID = $(this).data("id");				
                $.get(url_line,{id: fID},function (data){
                        // $("#activity-modal").find(".modal-body").html(data);
                        // $(".modal-body").html(data);
                        // $(".modal-title").html("ข้อมูล");
                        // $("#activity-modal").modal("show");
                    }
                );
            }); 
			var url_rePass = "reset_pass";
			$(".act-resetPass").click(function(e) {			
                var fID = $(this).data("id");				
                $.get(url_rePass,{id: fID},function (data){
                        // $("#activity-modal").find(".modal-body").html(data);
                        // $(".modal-body").html(data);
                        // $(".modal-title").html("ข้อมูล");
                        // $("#activity-modal").modal("show");
                    }
                );
            }); 

    	var url_up_un = "update_username";		
    	$(".act-view").click(function(e) {			
                var fID = $(this).data("id");
				
                $.get(url_up_un,{id: fID},function (data){
                        $("#activity-modal").find(".modal-body").html(data);
                        $(".modal-body").html(data);
                        $(".modal-title").html("ข้อมูล");
                        $("#activity-modal").modal("show");
                    }
                );
            });   
    
	}

    init_click_handlers(); //first run
			
	$('#activity-modal').on('hidden.bs.modal', function () {
 		location.reload();
	})    

    
    /* BASIC ;*/
    var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
	
				
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><button id="act-create" class="btn btn-success btn-md" alt="act-create"><i class="fa fa-plus "></i> act-create</button></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */  
        
    
			var url_create = "create";
    	$( "#act-create" ).click(function() {
        	$.get(url_create,function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("เพิ่มข้อมูล");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
                //   $("#myModal").modal('toggle');
        	});     
		}); 

});
JS;
$this->registerJs($script);
?>