<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\WebLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-link-form">

    <?php 
    $form = ActiveForm::begin([
		'id' => 'weblink-form',
		'options' => [
            'class' => 'smart-form',
            'novalidate'=>'novalidate',
            'enctype' => 'multipart/form-data'
        ],
        //'layout' => 'horizontal',
        'fieldConfig' => [
            //'template' => "{label}{input}{error}",
            'labelOptions' => ['class' => 'label'],
        ],
        'enableAjaxValidation' => true,
	]);  ?>

<div>

<?= $form->field($model, 'name', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('name')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('name').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>


</div> 
<div>
    <?= $form->field($model, 'link', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('link'),
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('link').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>

</div> 


<?= $form->field($model, 'img',[
   'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('img'),
        'onchange'=>'this.parentNode.nextSibling.value = this.value'
    ],
    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
])->fileInput()->label(false) ?>

<?php 
if (!empty($model->img)){
    $filename = Url::to('@webroot/uploads/weblink/').$model->id.'/'.$model->img;
    if (file_exists($filename)) {
        echo Html::img('@web/uploads/weblink/'.$model->id.'/'.$model->img, ['alt' => 'My logo1','class'=>'img']);
        // echo Url::to('@web/uploads/link/').$model->id.'/'.$model->img;
    }
    
}
?>
 
<fieldset class="text-right"> 
    <?= Html::resetButton('Reset', ['class' => 'btn btn-warning btn-lg']) ?> <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
</fieldset>

    <?php ActiveForm::end(); ?>

</div>
