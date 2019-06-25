
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Profile;
?>
			<!-- MAIN CONTENT -->
<div id="content">

	<!-- Bread crumb is created dynamically -->
	<!-- row -->
								
	<div class="row">
				
		<div class="col-sm-12">				
				
			<div class="well well-sm">
				
				<div class="row">
				
					<div class="col-sm-12 col-md-12 col-lg-6">
						<div class="well well-light well-sm no-margin no-padding">
				
							<div class="row">
				
								<div class="col-sm-12">
									<div id="myCarousel" class="carousel fade profile-carousel">
										<div class="air air-bottom-right padding-10">
											<!-- <a href="javascript:void(0);" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Follow</a> -->
												&nbsp; 
											<a id="chang_pass" data-id="<?=$mdProfile->user_id?>" href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-key"></i> เปลี่ยนPassword</a>
										</div>
										<div class="air air-top-left padding-10">
											<h4 class="txt-color-white font-md"><?=$mdUser->created_at?></h4>
										</div>
											<ol class="carousel-indicators">
												<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												<li data-target="#myCarousel" data-slide-to="1" class=""></li>
												<li data-target="#myCarousel" data-slide-to="2" class=""></li>
											</ol>
											<div class="carousel-inner">
												<!-- Slide 1 -->
												<div class="item active">
													<?= Html::img('@web/img/demo/s1.jpg', ['alt' => 'demo user']);?>	
												</div>
												<!-- Slide 2 -->
												<div class="item">
													<img src="/home/web/img/demo/s2.jpg" alt="demo user">
												</div>
												<!-- Slide 3 -->
												<div class="item">
													<img src="/home/web/img/demo/m3.jpg" alt="demo user">
												</div>
											</div>
										</div>
									</div>
				
									<div class="col-sm-12">
				
										<div class="row">
				
											<div class="col-sm-3 profile-pic">
												<img src="<?= Profile::getImgSrc(); ?>" alt="me" > 
												<div class="air air-bottom-right padding-10">
													<a id="act-edit-img" data-id="<?=$mdProfile->user_id?>" href="javascript:void(0);" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-gear fa-sm"></i></a>
												</div>															
											</div>
											<div class="col-sm-8">
												<h1> <?=$mdProfile->fname?><?=$mdProfile->name?>&nbsp;&nbsp;<?=$mdProfile->sname?>
												<a id="act-edit-profile" data-id="<?=$mdProfile->user_id?>" href="javascript:void(0);" class="btn bg-color-white txt-color-red"><i class="fa fa-gear fa-spin fa-lg"></i> แก้ไข</a>
												<br>
												<small> <?=$mdProfile->dep?></small></h1>
													<ul class="list-unstyled">
														<li>
															<p class="text-muted">
																<i class="fa fa-credit-card"></i>&nbsp;&nbsp; <span class="txt-color-darken"><?=$mdProfile->id_card?></span>
															</p>
														</li>
														<li>
															<p class="text-muted">
																<i class="fa fa-phone"></i>&nbsp;&nbsp; <span class="txt-color-darken"><?=$mdProfile->phone?></span>
															</p>
														</li>
														<li>
															<p class="text-muted">
															<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?=$mdUser->email?>"><?=$mdUser->email?></a>
															<a id="act-chang-email" data-id="<?=$mdProfile->user_id?>" href="javascript:void(0);" class="btn bg-color-white txt-color-red"><i class="fa fa-gear fa-spin fa-lg"></i> แก้ไข</a>
															
														</p>
														</li>
														<li>
															<p class="text-muted">
																<i class="fa fa-calendar-o"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?=$mdProfile->birthday?></span>
															</p>
														</li>
														<li>
															<p class="text-muted">
																<i class="fa fa-briefcase"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?=$mdProfile->address?></span>
															</p>
														</li>
														<li>
															<p class="text-muted">
																<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken">Free after <a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Create an Appointment">4:30 PM</a></span>
															</p>
														</li>
													</ul>
													<br>
													<br>
													<br>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<hr>
											<div class="padding-10">
												<ul class="nav nav-tabs tabs-pull-right">
													<li class="active">
														<a href="#a1" data-toggle="tab">Recent Articles</a>
													</li>
													<li>
														<a href="#a2" data-toggle="tab">New Members</a>
													</li>
													<li class="pull-left">
														<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
													</li>
												</ul>
												<div class="tab-content padding-top-10">
													<div class="tab-pane fade in active" id="a1">
														<div class="row">
															<div class="col-xs-2 col-sm-1">
																<time datetime="2014-09-20" class="icon">
																	<strong>Jan</strong>
																		<span>10</span>
																</time>
															</div>
															<div class="col-xs-10 col-sm-11">
																<h6 class="no-margin"><a href="javascript:void(0);">Allice in Wonderland</a></h6>
																<p>
																	Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi Nam eget dui.
																	Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
																	sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel.
																</p>
															</div>
															<div class="col-sm-12">
																<hr>
															</div>
															<div class="col-xs-2 col-sm-1">
																<time datetime="2014-09-20" class="icon">
																	<strong>Jan</strong>
																	<span>10</span>
																</time>
															</div>
															<div class="col-xs-10 col-sm-11">
																<h6 class="no-margin"><a href="javascript:void(0);">World Report</a></h6>
																<p>
																	Morning our be dry. Life also third land after first beginning to evening cattle created let subdue you'll winged don't Face firmament.
																	You winged you're was Fruit divided signs lights i living cattle yielding over light life life sea, so deep.
																Abundantly given years bring were after. Greater you're meat beast creeping behold he unto She'd doesn't. Replenish brought kind gathering Meat.
																		</p>
																	</div>
				
																	<div class="col-sm-12">
				
																		<br>
				
																	</div>
				
																</div>
				
															</div>
															<div class="tab-pane fade" id="a2">
				
																<div class="alert alert-info fade in">
																	<button class="close" data-dismiss="alert">
																		×
																	</button>
																	<i class="fa-fw fa fa-info"></i>
																	<strong>51 new members </strong>joined today!
																</div>
				
																<div class="user" title="email@company.com">
																	<img src="img/avatars/female.png" alt="demo user"><a href="javascript:void(0);">Jenn Wilson</a>
																	<div class="email">
																		travis@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Marshall Hitt</a>
																	<div class="email">
																		marshall@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Joe Cadena</a>
																	<div class="email">
																		joe@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Mike McBride</a>
																	<div class="email">
																		mike@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Travis Wilson</a>
																	<div class="email">
																		travis@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Marshall Hitt</a>
																	<div class="email">
																		marshall@company.com
																	</div>
																</div>
																<div class="user" title="Joe Cadena joe@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Joe Cadena</a>
																	<div class="email">
																		joe@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Mike McBride</a>
																	<div class="email">
																		mike@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Marshall Hitt</a>
																	<div class="email">
																		marshall@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);">Joe Cadena</a>
																	<div class="email">
																		joe@company.com
																	</div>
																</div>
																<div class="user" title="email@company.com">
																	<img src="img/avatars/male.png" alt="demo user"><a href="javascript:void(0);"> Mike McBride</a>
																	<div class="email">
																		mike@company.com
																	</div>
																</div>
				
																<div class="text-center">
																	<ul class="pagination pagination-sm">
																		<li class="disabled">
																			<a href="javascript:void(0);">Prev</a>
																		</li>
																		<li class="active">
																			<a href="javascript:void(0);">1</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);">2</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);">3</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);">...</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);">99</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);">Next</a>
																		</li>
																	</ul>
																</div>
				
															</div><!-- end tab -->
														</div>
				
													</div>
				
												</div>
				
											</div>
											<!-- end row -->
				
										</div>
				
									</div>
									<div class="col-sm-12 col-md-12 col-lg-6">
										<div class="well">
											<table class="table table-striped table-forum">
												<thead>
													<tr>
														<th class="text-center hidden-xs hidden-sm" style="width: 150px;">ประวัติการใช้งาน</th>
														<th class="text-center hidden-xs hidden-sm" style="width: 150px;"></th>
													</tr>
												</thead>
												<tbody>		                           
													<?php foreach ($modelLogs as $modelLog): ?>
						            				<tr>
														<td><?=$modelLog->create_at?></td>
														<td><?=$modelLog->detail?></td>																	        
													</tr>
													<?php  endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>				
				<!-- end row -->
			</div>
			<!-- END MAIN CONTENT -->
<?php

$script = <<< JS

$(document).ready(function() {	
	$('#activity-modal').on('hidden.bs.modal', function () {
 		location.reload();
	}) 

	
/* BASIC ;*/
		var url_create = 'edit_img';				
			$( "#act-edit-img" ).click(function() {
				var fID = $(this).data("id");
        	$.get(url_create,{id: fID},function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("แก้ไขภาพ");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
                //   $("#myModal").modal('toggle');
        	});     
		});

		var url_edit_profile = "edit_profile";		
			$( "#act-edit-profile" ).click(function() {
				var fID = $(this).data("id");	
        	$.get(url_edit_profile,{id: fID},function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("แก้ไข");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
        	});     
		});

		var url_chang_email = "chang_email";		
			$( "#act-chang-email" ).click(function() {
				var fID = $(this).data("id");	
        	$.get(url_chang_email,{id: fID},function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("แก้ไข");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
        	});     
		});

		var url_chang_pass = "chang_pass";		
			$( "#chang_pass" ).click(function() {
				var fID = $(this).data("id");
        	$.get(url_chang_pass,{id: fID},function (data){
                $("#activity-modal").find(".modal-body").html(data);
                $(".modal-body").html(data);
                $(".modal-title").html("เปลี่ยน Password");
            	// $(".modal-footer").html(footer);
                $("#activity-modal").modal("show");
                //   $("#myModal").modal('toggle');
        	});     
		});
	});
JS;
$this->registerJs($script);
?>