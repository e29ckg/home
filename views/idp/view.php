<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Idp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Idps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="idp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date_idp',
            'date_idp_end',
            'num',
            'comment',
            'created_at',
        ],
    ]) ?>
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
                                                <th data-class="expand">Id</th>
                                                <th>ชื่อ</th>
                                                <th>ชื่อ</th>
                                                <th>เครื่องมือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($model2 as $model_file): ?>
                                            <tr>
                                                <td><?=$model_file->id?></td>
                                                <td>
                                                    <?=$model_file->id_idp?>
                                                </td>
                                                <td>
                                                <a href= "index.php?r=idp/showfile&id=<?=$model_file->id?>" target="_blank"> <?=$model_file->name_file?></a>
                                                    
                                                </td>
                                                <td>
                                                    <a herf= "#" class="btn btn-warning act-update" data-id=<?=$model_file->id?>><i class="fa fa-pencil-square-o"></i> แก้ไข</a>
                                                    <a herf= "#" class="btn btn-warning act-view" data-id=<?=$model_file->id?>><i class="fa fa-pencil-square-o"></i> ดู</a>
                                                    <?= Html::a('<i class="fa fa-remove"></i> ลบ',['product/delete','id' => $model_file->id],
                                                            [
                                                                'class' => 'btn btn-danger act-update',
                                                                'data-confirm' => 'Are you sure to delete this item?',
                                                                'data-method' => 'post',
                                                            ]);
                                                    ?>
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
            <a herf="" data-id=<?=$model->id?> class = "btn btn-primary act-create-file" >add</a>
            <?= Html::a('เพิ่มFile', ['#', 'id' => $model->id], ['class' => 'btn btn-primary act-create-file']) ?>
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
       
	function init_click_handlers(){        	
		
		var url_update = "index.php?r=idp/update";
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

        var url_addfile = "index.php?r=idp/addfile";
    	$(".act-create-file").click(function(e) {            
			var fID = $(this).data("id");
			// alert(fID);
        	$.get(url_addfile,{id: fID},function (data){
            	$("#activity-modal").find(".modal-body").html(data);
            	$(".modal-body").html(data);
            	$(".modal-title").html("แก้ไขข้อมูลสมาชิก");
            	$("#activity-modal").modal("show");
        	});
    	});

		var url_line = "index.php?r=idp/line_alert";		
    	$(".act-line").click(function(e) {			
                var fID = $(this).data("id");				
                $.get(url_line,{id: fID},function (data){
                        $("#activity-modal").find(".modal-body").html(data);
                        $(".modal-body").html(data);
                        $(".modal-title").html("ข้อมูล");
                        $("#activity-modal").modal("show");
                    }
                );
            }); 

    	var url_show_file = "index.php?r=idp/showfile";		
    	$(".act-show-file").click(function(e) {			
                var fID = $(this).data("id");				
                $.get(url_show_file,{id: fID},function (data){
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


			var url_create = "index.php?r=idp/addfile";
    	$( "#act-create-file" ).click(function() {
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
