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
<div class="profile-form text-center">
<?php
	if (!empty($model->img)){
		if(file_exists('uploads/weblink/'.$model->img)){
			echo '<img src="uploads/weblink/'.$model->img.'" alt="Pic" class="img-thumbnail">';
		}else{
			echo '<img src="uploads/user/none.png" alt="Pic" class="img-thumbnail">';
		}
	}else{
		echo '<img src="uploads/user/none.png" alt="Pic" class="img-thumbnail">';
	}
?>
</div>
<br>
<div class="profile-form text-center">
<a href="<?=$model->link?>" class="btn btn-success" target="_blank"><i class="fa fa-external-link"></i> <?=$model->name .' : '.$model->link?></a>

</div>
