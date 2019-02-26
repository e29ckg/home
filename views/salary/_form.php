<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\WebLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-link-form">

    <?php 
    $form = ActiveForm::begin([
		'id' => 'salary-form',
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


</div> 
<div>
<?php 
echo $form->field($model, 'user_id')->widget(Select2::classname(), [
    'data' => $model->getProfileList(),
    'language' => 'th',
    'options' => ['placeholder' => ' เลือก...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false);

?> 

</div> 

<?= $form->field($model, 'file',[
   'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('file'),
        'onchange'=>'this.parentNode.nextSibling.value = this.value'
    ],
    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
])->fileInput()->label(false) ?>

<?php 
if (!empty($model->img)){
    $filename = Url::to('@webroot/uploads/salary/').$model->img;
    if (file_exists($filename)) {
        echo Url::to('@web/uploads/salary/').$model->img;
    }
    
}
?>
 
<fieldset class="text-right"> 
    <?= Html::resetButton('Reset', ['class' => 'btn btn-warning btn-lg']) ?> <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
</fieldset>

    <?php ActiveForm::end(); ?>

</div>
