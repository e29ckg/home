<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'คำพากษาส่งภาค 7');
$this->params['breadcrumbs'][] = $this->title;
// echo var_dump($countM1);
?>

<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-fw fa-paper-plane-o"></i> 
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
				<h5> <a href="#" id = "viewM1" data =""> <?= $NameM1?> </a> <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;<?=$countM1?></span></h5>
					<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
            </a>
			</li>
			<li class="sparks-info">
				<h5> <a href="#" id = "viewM2" data =""> <?= $NameM2?> </a><span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;<?=$countM2?></span></h5>
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
						<span class="widget-icon"> <i class="fa fa-paper-plane-o"></i> </span>
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
					                    <th data-class="expand">Id</th>
										<th >เลขดำ</th>
					                    <th >คำพิพากษา</th>
										<th >ร่าง</th>
										<th >Date</th>
					                    <th ></th>
					                    
						            </tr>
								</thead>
								<tbody>
									<?php foreach ($models as $model): ?>
						            <tr>
						                <td><?=$model->id?></td>	
										<td><?=$model->name?></td>					                								        
										<td><?= Html::a($model->file ? 'คำพากษา<i class="fa fa-file-pdf-o"></i>':'',['ppss/show','id' => $model->id],['target' => '_blank']);?></td>
								        <td><?= Html::a($model->file2 ? 'ร่าง<i class="fa fa-file-pdf-o"></i>':'',['ppss/show2','id' => $model->id],['target' => '_blank']);?></td>
										<td><?=$model->create_at?></td>
								        <td>
											<a herf= "#" class="btn btn-warning act-update" data-id=<?=$model->id?>><i class="fa fa-pencil-square-o"></i> แก้ไข</a>
											<a herf= "#" class="btn btn-warning act-view" data-id=<?=$model->id?>><i class="fa fa-pencil-square-o"></i> ดู</a>
											<?php if(Yii::$app->user->identity->role == 9){
												echo '<a herf= "#" class="btn btn-warning act-update-admin" data-id='.$model->id.'><i class="fa fa-pencil-square-o"></i> ดู </a> ';
												echo Html::a('<i class="fa fa-remove"></i> ลบ',['ppss/delete','id' => $model->id],
												[
													'class' => 'btn btn-danger',
													'data-confirm' => 'Are you sure to delete this item?',
													'data-method' => 'post',
												]);
											}  ?>
											
										</td>
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
/* BASIC ;*/	
		$("#viewM1").click(function(e) {
            var data = $(this).attr("data");
                $.get(
                    "?r=ppss/viewm1",{year:data},
                    function (data)
                    {
                        $("#activity-modal").find(".modal-body").html(data);
                        $(".modal-body").html(data);
                        $(".modal-title").html("เพิ่มข้อมูล");
                        $("#activity-modal").modal("show");
                    }
                );
            });
        
        $("#viewM2").click(function(e) {
            var data = $(this).attr("data");
                $.get(
                    "?r=ppss/viewm2",{year:data},
                    function (data)
                    {
                        $("#activity-modal").find(".modal-body").html(data);
                        $(".modal-body").html(data);
                        $(".modal-title").html("เพิ่มข้อมูล");
                        $("#activity-modal").modal("show");
                    }
                );
            });	
       
	function init_click_handlers(){        	
		
		var url_update = "index.php?r=ppss/update";
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
		
		var url_update_admin = "index.php?r=ppss/update_admin";
    	$(".act-update-admin").click(function(e) {            
			var fID = $(this).data("id");
			// alert(fID);
        	$.get(url_update_admin,{id: fID},function (data){
            	$("#activity-modal").find(".modal-body").html(data);
            	$(".modal-body").html(data);
            	$(".modal-title").html("แก้ไขข้อมูลสมาชิก");
            	$("#activity-modal").modal("show");
        	});
    	});

    	var url_view = "index.php?r=ppss/view";		
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

			otable.order( [[ 0, 'desc' ], [ 2, 'asc' ]] ).draw();

/* END COLUMN FILTER */  


			var url_create = "index.php?r=ppss/create";
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


//load_data();

var count = 1;

	
function add_dynamic_input_field(count)
	{
		var button = '';
		if(count > 1)
		{
			button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">x</button>';
		}
		else
		{
			button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
		}
		output = '<tr id="row'+count+'">';
		output += '<td><input type="text" name="programming_languages[]" placeholder="Add Programming Languages" class="form-control name_list" /></td>';
		output += '<td align="center">'+button+'</td></tr>';
		$('#dynamic_field').append(output);
	}

	$('#add').click(function(){
		$('#dynamic_field').html('');
		add_dynamic_input_field(1);
		$('.modal-title').text('Add Details');
		$('#action').val("insert");
		$('#submit').val('Submit');
		// $('#add_name')[0].reset();
		$('#dynamic_field_modal').modal('show');
	});

	$(document).on('click', '#add_more', function(){
		count = count + 1;
		add_dynamic_input_field(count);
	});

		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		
});
JS;
$this->registerJs($script);
?>