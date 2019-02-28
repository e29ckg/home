<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Links';
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
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> ข้อมูลทั้งหมด <span class="txt-color-blue"><i class="fa fa-user" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;<?= $countAll?></span></h5>
				<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm"></div>
			</li>
			<li class="sparks-info">
				<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
					<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
			</li>
			<li class="sparks-info">
				<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
					<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm"></div>
			</li>
		</ul>
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
					                    <th data-class="expand"> # </th>
										<th >User_id</th>
					                    <th >Manager</th>
					                    <th >Detail</th>
										<th >IP</th>	
										<th >Create_At</th>		
						            </tr>
								</thead>
								<tbody>  
									<?php $i = 1?>                              
									<?php foreach ($models as $model): ?>
						            <tr>
						                <td><?= $i++?></td>
                                        <td><?=$model->user_id?></td>
                                        <td><?=$model->manager?></td>
										<td><?=$model->detail?></td>			
										<td><?=$model->ip?></td>	
										<td><?=$model->create_at?></td>						        
									</tr>
									<?php  endforeach; ?>
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

		var url_show = "index.php?r=web_link/show";				
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

		var url_update = "index.php?r=web_link/update";
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

		
    	var url_view = "index.php?r=web_link/view";		
    	$(".act-view").click(function(e) {			
                var fID = $(this).data("id");
				
                $.get(url_view,{id: fID},function (data){
                        $("#activity-modal").find(".modal-body").html(data);
                        $(".modal-body").html(data);
                        $(".modal-title").html("ข้อมูล");
                        $("#activity-modal").modal("show");
                    }
                );
            }); 

			
    
	}

    init_click_handlers(); //first run
			
	// $('#activity-modal').on('hidden.bs.modal', function () {
 	// 	location.reload();
	// })

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
				// "paging":   false,
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					// responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
												
		    // $("div.toolbar").html('<div class="text-right"><button id="act-create" class="btn btn-success btn-md" alt="act-create"><i class="fa fa-plus "></i> act-create</button></div>');
			   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );

			otable.order( [[ 0, 'asc' ], [ 2, 'asc' ]] ).draw();

/* END COLUMN FILTER */  

		var url_create = "index.php?r=web_link/create";
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