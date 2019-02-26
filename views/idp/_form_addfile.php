<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Idps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view','id' => $model->id]];
$this->params['breadcrumbs'][] = 'เพิ่ม File';
?>

<?php    
   // print_r(explode(',',$model->tel));
?>

<?php 
    $form = ActiveForm::begin([
		'id' => 'addFile-form',
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
<?= $form->field($model2, 'name_file', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('name_file')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">กรอกชื่อ</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>

    <?= $form->field($model2, 'file_path',[
   'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('file_path'),
        'onchange'=>'this.parentNode.nextSibling.value = this.value'
    ],
    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
])->fileInput() ?>


</div>    



</div>

 


<fieldset class="text-right"> 
<?= Html::resetButton('Reset', ['class' => 'btn btn-warning btn-lg']) ?> <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
</fieldset> 
    <?php ActiveForm::end(); ?>

</fieldset>
