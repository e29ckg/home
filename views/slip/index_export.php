<?php

use yii\helpers\Html;

use app\models\Slip;
use app\models\User;
use app\models\Profile;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ส่งออก EXCElL';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-lg fa-book"></i> 
			<?= $this->title;?>
			<span></span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		
	</div>
</div>
<div>
    <!-- widget grid -->
	<section id="widget-grid" class="">
				
        <!-- row -->
        <div class="row">
            
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
             	<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2><?= $this->title;?> <?= Slip::DateThai_month_full(date("Y-m-d"));?></h2>
						<?= date("Y") ?>
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
					                    <th data-class="expand"> # </th>
										<th >ชื่อ</th>
					                    <th ></th>
					                    <th >Link</th>
										
						            </tr>
								</thead>
								<tbody>  
									<?php 
										(int)$y = date("Y");
										(int)$m = date("n");
										
									?>  
									                          
									<?php 
										for ($x = 0; $x <= 10; $x++) {
											
											echo '<tr>'; 											
											echo '<td>#</td>';
											echo '<td><a href="'.Url::to(['slip/export_m','y' => $y , 'm'=> $m]).'">'.Slip::DateThai_month((int)$m) .' '.((int)$y + 543).'</a></td>';
											echo '<td></td>';
											echo '<td></td>';
											echo '</tr>';
											$m = $m-1;
											if((int)$m == 0){
												$y = $y - 1;
												$m = 12;
											}else{
												$y = $y;
												// $m = $m - 1;
											}
										}
									?>
									
						            									
								</tbody>	
							</table>
						</div>
					</div>							
            </article>
        </div>
	</section>	
</div>

<?php

$script = <<< JS
    
$(document).ready(function() {	
/* BASIC ;*/	
		        
	function init_click_handlers(){    

		var url_show = "show";				
			$( ".act-show" ).click(function() {
				var fID = $(this).data("id");
        	$.get(url_show,{id: fID},function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("show");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
                //   $("#myModal").modal('toggle');
        	});     
		});

		var url_update_u = "update_u";
    	$(".act-update-u").click(function(e) {            
			var fID = $(this).data("id");
			// alert(fID);
        	$.get(url_update_u,{id: fID},function (data){
            	$("#activity-modal").find(".modal-body").html(data);
            	$(".modal-body").html(data);
            	$(".modal-title").html("แก้ไขข้อมูลสมาชิก");
            	$("#activity-modal").modal("show");
        	});
    	}); 
    
	}

    init_click_handlers(); //first run
			
	$('#activity-modal').on('hidden.bs.modal', function () {
 		location.reload();
	})

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
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 'f><'col-sm-6 col-xs-12 '<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"paging":   false,
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					// responsiveHelper_datatable_fixed_column.respond();
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

			// otable.order( [[ 0, 'asc' ], [ 2, 'asc' ]] ).draw();
			// otable.order(false);

/* END COLUMN FILTER */  

		var url_create_u = "create_u";
    	$( "#act-create" ).click(function() {
        	$.get(url_create_u,function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("เพิ่มข้อมูล");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
                //   $("#myModal").modal('toggle');
        	});     
		}); 
		
		var url_create_s = "create_s";
    	$( ".act-create-slip" ).click(function() {
        		var fID = $(this).data("id");
        	$.get(url_create_s,{id: fID},function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("show");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
                //   $("#myModal").modal('toggle');
        	});
		});

});
JS;
$this->registerJs($script);
?>