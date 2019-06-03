<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="text-center">
<a href="<?=$model->link?>" class="" target="_blank"><i class="fa fa-gear fa-sm"></i> <?=$model->name .' : '.$model->link?></a>
								
</div>
<div class="profile-form text-center">


</div>
<div class="text-center">
<?php
	if (!empty($model->img)){		
		echo Html::img('@web/uploads/weblink/'.$model->id.'/'.$model->img, ['alt' => 'My logo1','class'=>'img-thumbnail']);
	}else{
		echo Html::img('@web/img/none.png', ['alt' => 'My logo1']);
	}
?>
</div>
<br>
<div class="profile-form text-center">
<a href="<?=$model->link?>" class="btn btn-success" target="_blank"><i class="fa fa-external-link"></i> <?=$model->name .' : '.$model->link?></a>

</div>

<div class="row">
<br>
</div>
<div>
	<section>
		<div class="row">
			<article>
			<!-- <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable"> -->
				<table class="table table-bordered">
												<!-- <thead>
													<tr>
														<th>Column name</th>
														<th>Column name</th>
													</tr>
												</thead> -->
												<tbody>
												<?php foreach ($modelFiles as $modelFile):?>
													<tr>
														<td><?= $modelFile->name.'.'.$modelFile->type?></td>
														<td><a href="<?= Url::to('@web/uploads/weblink/'.$modelFile->web_link_id.'/'.$modelFile->file)?>"  target="_blank">ดาวน์โหลด</a></td>
													</tr>	
												<?php endforeach;?>												
												</tbody>
											</table>
			<!-- </div> -->
			</article>
		<div>
	</section>
</div>
<div>
	
</div>
