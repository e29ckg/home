<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use app\models\User;
use app\models\Profile;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

AppAsset::register($this);

if (!Yii::$app->user->isGuest){
	$mdProfile = Profile::find()->where(['user_id'=> Yii::$app->user->id])->one();
	
}else{
	// $mdProfile = Profile::find()->where(['user_id'=> 1])->one();
	// if($mdProfile->img == ''){
	// 	$mdProfile->img = 'nopic.png';
	// 	$mdProfile->save();
	// }
}

				
?>
						

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<meta name="description" content="">
		<meta name="author" content="">			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<?php $this->head() ?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	
	<body class="" >
	<?php $this->beginBody() ?>
		
	<?php
		Modal::begin([
  			'id' => 'activity-modal',
   			'header' => '<h4 class="modal-title"></h4>',
			   'size' => 'modal-lg',
			   'options' => ['tabindex' => ''],
   			// 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
		]);
		echo "<div id='modalContent'></div>";
		Modal::end();
	?>
                
		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE <span id="logo"> <img src="img/logo.png" alt="SmartAdmin"> -->
				
				<span id="logo"><?= Html::img('@web/img/logo.png', ['alt' => 'My logo']) ?></span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 0 </b> </span>
				
				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">Projects:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span> 

				<!-- Suggestion: populate this list with fetch and push technique -->
				<!-- <ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
					</li>
					<li>
						<a href="javascript:void(0);">Notes on pipeline upgradee</a>
					</li>
					<li>
						<a href="javascript:void(0);">Assesment Report for merchant account</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
					</li>
				</ul> -->
				<!-- end dropdown-menu-->

			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> 
					<!-- <form method="post">
     					<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    					<button type="submit"> Save </button>
					</form> -->
					<?= !Yii::$app->user->isGuest ? 
						// '<a href="index.php?r=site/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser" ><i class="fa fa-sign-out"></i></a>'
						Html::a('<i class="fa fa-sign-out"></i> Logout', ['site/logout'], [
							// 'class' => 'btn btn-danger',
							// 'data-action'=> 'userLogout',
							// 'data-logout-msg' => 'You can improve your security further after logging out by closing this opened browser',
							'data-confirm' => 'Are you sure to delete this item?',
                            'data-method' => 'post',
							]) 
						: 
						// '<a href="index.php?r=site/login" class="btn btn-danger">Login</a>';
						Html::a('<i class="fa fa-sign-in"></i> Login', ['site/login'], ['class' => 'btn btn-danger']) ;
					?>
							
					</span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<form action="search.html" class="header-search pull-right">
					<input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
					"ActionScript",
					"Ruby",
					"Scala",
					"Scheme"]'>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->		
				

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					<?php
					if(!Yii::$app->user->isGuest){ 
						// '<a href="index.php?r=site/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser" ><i class="fa fa-sign-out"></i></a>'
						if($mdProfile->img){
							echo Html::img('@web/uploads/user/'.$mdProfile->img, ['alt' => 'My logo']);
						}else{
							echo Html::img('@web/img/none.png', ['alt' => 'My logo']);
						} 
						echo Html::a('<span>'.$mdProfile->fname.$mdProfile->name.' '.$mdProfile->sname .' </span> <i class="fa fa-angle-down"></i>', ['user/profile'], []) ;
					}else{
						echo Html::img('@web/img/none.png', ['alt' => 'My logo']).
						Html::a('<span>Guest <i class="fa fa-sign-in"></i></span>  Login', ['site/login'], ['class' => 'btn btn-danger']) ;
					}
						?>
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->

		<?= $this->render('nav');?>	

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				
				<?php
				echo Breadcrumbs::widget([
    				'tag' => 'ol',
    				'homeLink' => ['label' => '<i class="fa fa-home"></i> Home', 'url' => ['site/index']],
    				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    				'encodeLabels' => false,
				]);
				?>
				<!-- end breadcrumb -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<?= Alert::widget() ?>
        		<?= $content ?>
				
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
				<?= $this->render('footer')?>
		</div>
		<!-- END PAGE FOOTER -->		

		<!--================================================== -->
		
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script> -->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

<?php $this->endBody() ?>
          

	</body>	
</html>
<?php $this->endPage() ?>
