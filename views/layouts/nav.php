<?php
use yii\helpers\Html;

?>
  
    
<nav>
<?php if(Yii::$app->user->isGuest){
$menu = [
	[
		'label' => 'Dashboard',
		'url' => ['/site/main'],
		'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">{label}</span></a>',
		
	],
	[
		'label' => 'WebLink',
		'url' => ['/web_link/index'],
		'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-external-link"></i> <span class="menu-item-parent">{label}</span></a>',
		
	],
	[

		'label' => 'ส่งสำเนาคำพิพากษาไปภาค7',
		'url' => ['/ppss/index'],
		'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-paper-plane-o"></i> <span class="menu-item-parent">{label}</span></a>',
		
	],
	[
		'label' => 'เบิกของ Cartx',
		'url' => '/cartx/web',
		'template' => '<a href="{url}" title="{label}" target="_blank"> <i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">{label}</span></a>',
	
	],		
	[
		'label' => 'ช่วยอำนวยการพัฒนา',  
		'url' => ['#'],
		'template' => '<a href="#" title="{label}"><i class="fa fa-lg fa-fw fa-cab"></i> <span class="menu-item-parent">{label}</span></a>',
		'items' => [
			// [
			// 	'label' => 'ระบบรักษาความปลอดภัย',
			// 	'url' => '/scrt/web',
			// 	'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
				
			// ],			
			[
				'label' => 'Contact',
				'url' => ['/co/index'],
				'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-phone"></i> <span class="menu-item-parent">{label}</span></a>',
				
			],
			
		]
	],	    
];
}else if(Yii::$app->user->identity->role == 9){
	$menu = [
		[
			'label' => 'Dashboard',
			'url' => ['/site/main'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],	
		[
			'label' => 'สลิปเงินเดือน',
			'url' => ['/salary/index'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],	
		[
			'label' => 'WebLink',
			'url' => ['/web_link/index'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-external-link"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],
		[
	
			'label' => 'ส่งสำเนาคำพิพากษาไปภาค7',
			'url' => ['/ppss/index'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-paper-plane-o"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],
		[
			'label' => 'เบิกของ Cartx',
			'url' => '/cartx/web',
			'template' => '<a href="{url}" title="{label}" target="_blank"> <i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">{label}</span></a>',
		
		],		
		[
			'label' => 'ช่วยอำนวยการพัฒนา',  
			'url' => ['#'],
			'template' => '<a href="#" title="{label}"><i class="fa fa-lg fa-fw fa-cab"></i> <span class="menu-item-parent">{label}</span></a>',
			'items' => [
				[
					'label' => 'ใบลาพักผ่อน',
					'url' => ['/log/test1'],
					'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
				[
					'label' => 'ใบลาป่วย',
					'url' => ['/log/test'],
					'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
				[
					'label' => 'ระบบรักษาความปลอดภัย',
					'url' => '/scrt/web',
					'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],			
				[
					'label' => 'Contact',
					'url' => ['/co/index'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-phone"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
			]
		],	
		[
			'label' => 'Setting',  
			'url' => ['#'],
			'template' => '<a href="#" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
			'items' => [
				
				[
					'label' => 'User',
					'url' => ['/user/index'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
				],
				[
					'label' => 'Profile',
					'url' => ['/user/profile'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
				],
				[
					'label' => 'หนังสือเวียน',
					'url' => ['/cletter/index'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
				[
					'label' => 'สลิปเงินเดือน',
					'url' => ['/salary/admin'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">{label}</span></a>',
				],
				[
					'label' => 'Web_Link',
					'url' => ['/web_link/admin'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-external-link"></i> <span class="menu-item-parent">{label}</span></a>',
				],
				[
					'label' => 'PhpmyAdmin',
					'url' => 'phpmyadmin',
					'template' => '<a target="_blank" href="http://'.$_SERVER["HTTP_HOST"].'/{url}" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
				],
				[
					'label' => 'SmartAdmin',
					'url' => 'html',
					'template' => '<a target="_blank" href="http://'.$_SERVER["HTTP_HOST"].'/{url}" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
				],
				[
					'label' => 'Log',
					'url' => ['/log/index'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
				],
			],
		],
	];
}else{
	$menu = [
		[
			'label' => 'Dashboard',
			'url' => ['/site/main'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],
		[
			'label' => 'สลิปเงินเดือน',
			'url' => ['/salary/index'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],
		[
			'label' => 'WebLink',
			'url' => ['/web_link/index'],
			'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-external-link"></i> <span class="menu-item-parent">{label}</span></a>',
			
		],
		// [
	
		// 	'label' => 'ส่งสำเนาคำพิพากษาไปภาค7',
		// 	'url' => ['/ppss/index'],
		// 	'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-paper-plane-o"></i> <span class="menu-item-parent">{label}</span></a>',
			
		// ],
		// [
		// 	'label' => 'เบิกของ Cartx',
		// 	'url' => '/cartx/web',
		// 	'template' => '<a href="{url}" title="{label}" target="_blank"> <i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">{label}</span></a>',
		
		// ],		
		[
			'label' => 'ช่วยอำนวยการพัฒนา',  
			'url' => ['#'],
			'template' => '<a href="#" title="{label}"><i class="fa fa-lg fa-fw fa-cab"></i> <span class="menu-item-parent">{label}</span></a>',
			'items' => [
				[
					'label' => 'ใบลาพักผ่อน',
					'url' => ['/log/test1'],
					'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
				[
					'label' => 'ใบลาป่วย',
					'url' => ['/log/test'],
					'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
				[
					'label' => 'ระบบรักษาความปลอดภัย',
					'url' => '/scrt/web',
					'template' => '<a href="{url}" title="{label}" target="_blank"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],			
				[
					'label' => 'Contact',
					'url' => ['/co/index'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-phone"></i> <span class="menu-item-parent">{label}</span></a>',
					
				],
			]
		],	
		[
			'label' => 'Setting',  
			'url' => ['#'],
			'template' => '<a href="#" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
			'items' => [			
				[
					'label' => 'Profile',
					'url' => ['/user/profile'],
					'template' => '<a href="{url}" title="{label}"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{label}</span></a>',
				],
			],
		],
	];
}
?>


<?=\yii\widgets\Menu::widget([
'options' => ['class' => ''],
'items' => $menu,
'submenuTemplate' => "\n<ul>\n{items}\n</ul>\n",
'encodeLabels' => false, //allows you to use html in labels
'activateParents' => true,   
]);  ?>
</nav>