<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\CLetter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cletter-form">

    <?php 
    $form = ActiveForm::begin([
		'id' => 'cletter-form',
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
<?= $form->field($model, 'due', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('due')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('due').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>


</div>    

<div>

    
</div> 

<div class="row">

</div>


<div>


<fieldset class="text-right"> 
<?= Html::resetButton('Reset', ['class' => 'btn btn-warning btn-lg']) ?> <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>

    <?php ActiveForm::end(); ?>
</fieldset>
</div>
