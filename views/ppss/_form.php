<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\Ppss */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if (Yii::$app->user->identity) {
    $id = Yii::$app->user->identity->id;
    // $profile = profile::find()->where(['user_id' => $id])->one();
    $profile = Yii::$app->user->identity->username ;
}
?>

<?php 
    $form = ActiveForm::begin([
		'id' => 'contact-form',
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
 
<fieldset> 

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
<?= $form->field($model, 'file',[
   'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('file'),
        'onchange'=>'this.parentNode.nextSibling.value = this.value'
    ],
    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files '.$model->getAttributeLabel('file').'" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
])->fileInput() ?>
</div>
<?php 
if (!empty($model->file)){
    $filename = Url::to('@webroot/uploads/ppss/').$model->file;
    if (file_exists($filename)) {
        echo $filename;
        // echo Html::img('@web/uploads/ppss/'.$model->file, ['alt' => 'My pic','class'=>'img-thumbnail']);
    }
    
}
?>
<div>
<?= $form->field($model, 'file2',[
   'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('file2'),
        'onchange'=>'this.parentNode.nextSibling.value = this.value'
    ],
    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files '.$model->getAttributeLabel('file2').'" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
])->fileInput() ?>
</div>
<?php 
if (!empty($model->file2)){
    $filename2 = Url::to('@webroot/uploads/ppss/').$model->file2;
    if (file_exists($filename2)) {
        echo $filename2;
        // echo Html::img('@web/uploads/ppss/'.$model->file, ['alt' => 'My pic','class'=>'img-thumbnail']);
    }
    
}
?>
<fieldset>
<?= $form->field($model, 'create_own')->hiddenInput(['readonly' => true, 'value' => Yii::$app->user->identity->id])->label(false) ?>

<fieldset class="text-right"> 
ผู้บันทึก : <?= (Yii::$app->user->identity ? Yii::$app->user->identity->username : 'Guest'); ?>   
<?= Html::resetButton('Reset', ['class' => 'btn btn-warning btn-lg']) ?> <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
 
</fieldset> 
    <?php ActiveForm::end(); ?>




