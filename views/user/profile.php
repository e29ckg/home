
			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- Bread crumb is created dynamically -->
				<!-- row -->
				<div class="row">
				
					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-puzzle-piece"></i> App Views <span>>
							Profile </span></h1>
					</div>
					<!-- end col -->
				
					<!-- right side of the page with the sparkline graphs -->
					<!-- col -->
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<!-- sparks -->
						<ul id="sparks">
							<li class="sparks-info">
								<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
								
							</li>
							<li class="sparks-info">
								<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
								
							</li>
							<li class="sparks-info">
								<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
								
							</li>
						</ul>
						<!-- end sparks -->
					</div>
					<!-- end col -->
				
				</div>
				<!-- end row -->
				
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
																<img src="img/demo/s1.jpg" alt="demo user">
															</div>
															<!-- Slide 2 -->
															<div class="item">
																<img src="img/demo/s2.jpg" alt="demo user">
															</div>
															<!-- Slide 3 -->
															<div class="item">
																<img src="img/demo/m3.jpg" alt="demo user">
															</div>
														</div>
													</div>
												</div>
				
												<div class="col-sm-12">
				
													<div class="row">
				
														<div class="col-sm-3 profile-pic">
															<img src="<?=file_exists('uploads/user/'.$mdProfile->img) ? 'uploads/user/'.$mdProfile->img : 'img/avatars/male.png' ?>" alt="demo user">
														
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
																		<i class="fa fa-phone"></i>&nbsp;&nbsp; <span class="txt-color-darken"><?=$mdProfile->id_card?></span>
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
																		<i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?=$mdProfile->birthday?></span>
																	</p>
																</li>
																<li>
																	<p class="text-muted">
																		<i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?=$mdProfile->address?></span>
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
				
										<form method="post" class="well padding-bottom-10" onsubmit="return false;">
											<textarea rows="2" class="form-control" placeholder="What are you thinking?"></textarea>
											<div class="margin-top-10">
												<button type="submit" class="btn btn-sm btn-primary pull-right">
													Post
												</button>
												<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
												<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Voice"><i class="fa fa-microphone"></i></a>
												<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Photo"><i class="fa fa-camera"></i></a>
												<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add File"><i class="fa fa-file"></i></a>
											</div>
										</form>
				
										<div class="timeline-seperator text-center"> <span>10:30PM January 1st, 2013</span>
											<div class="btn-group pull-right">
												<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
												<ul class="dropdown-menu text-left">
													<li>
														<a href="javascript:void(0);">Hide this post</a>
													</li>
													<li>
														<a href="javascript:void(0);">Hide future posts from this user</a>
													</li>
													<li>
														<a href="javascript:void(0);">Mark as spam</a>
													</li>
												</ul>
											</div> 
										</div>
										<div class="chat-body no-padding profile-message">
											<ul>
												<li class="message">
													<img src="img/avatars/sunny.png" class="online" alt="sunny">
													<span class="message-text"> <a href="javascript:void(0);" class="username">John Doe <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very
														image let unto fowl isn't in blessed fill life yielding above all moved </span>
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-muted">Show All Comments (14)</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-primary">Edit</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger">Delete</a>
														</li>
													</ul>
												</li>
												<li class="message message-reply">
													<img src="img/avatars/3.png" class="online" alt="user">
													<span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>
				
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-muted">1 minute ago </a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
													</ul>
				
												</li>
												<li class="message message-reply">
													<img src="img/avatars/4.png" class="online" alt="user">
													<span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>
				
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-muted">a moment ago </a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
													</ul>
													<input class="form-control input-xs" placeholder="Type and enter" type="text">
												</li>
											</ul>
				
										</div>
				
										<div class="timeline-seperator text-center"> <span>11:30PM November 27th, 2013</span>
											<div class="btn-group pull-right">
												<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
												<ul class="dropdown-menu text-left">
													<li>
														<a href="javascript:void(0);">Hide this post</a>
													</li>
													<li>
														<a href="javascript:void(0);">Hide future posts from this user</a>
													</li>
													<li>
														<a href="javascript:void(0);">Mark as spam</a>
													</li>
												</ul>
											</div> 
										</div>
										<div class="chat-body no-padding profile-message">
											<ul>
												<li class="message">
													<img src="img/avatars/1.png" class="online" alt="user">
													<span class="message-text"> <a href="javascript:void(0);" class="username">John Doe <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very image let unto fowl isn't in blessed fill life yielding above all moved </span>
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-muted">Show All Comments (14)</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-primary">Hide</a>
														</li>
													</ul>
												</li>
												<li class="message message-reply">
													<img src="img/avatars/3.png" class="online" alt="user">
													<span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>
				
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-muted">1 minute ago </a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
													</ul>
				
												</li>
												<li class="message message-reply">
													<img src="img/avatars/4.png" class="online" alt="user">
													<span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>
				
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-muted">a moment ago </a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
													</ul>
				
												</li>
												<li class="message message-reply">
													<img src="img/avatars/4.png" class="online" alt="user">
													<span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>
				
													<ul class="list-inline font-xs">
														<li>
															<a href="javascript:void(0);" class="text-muted">a moment ago </a>
														</li>
														<li>
															<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
														</li>
													</ul>
				
												</li>
												<li>
													<div class="input-group wall-comment-reply">
														<input id="btn-input" type="text" class="form-control" placeholder="Type your message here...">
														<span class="input-group-btn">
															<button class="btn btn-primary" id="btn-chat">
																<i class="fa fa-reply"></i> Reply
															</button> </span>
													</div>
												</li>
											</ul>
				
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

$('#activity-modal').on('hidden.bs.modal', function () {
 		location.reload();
	}) 

     
$(document).ready(function() {	
	
/* BASIC ;*/
		var url_create = "index.php?r=user/edit_img";				
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

		var url_edit_profile = "index.php?r=user/edit_profile";		
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

		var url_chang_email = "index.php?r=user/chang_email";		
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

		var url_chang_pass = "index.php?r=user/chang_pass";		
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