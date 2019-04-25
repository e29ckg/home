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
<?= $form->field($model, 'dep1', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('dep1')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('dep1').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>
</div> 
<div>
<?= $form->field($model, 'dep2', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('dep2')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('dep2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>
</div> 
<div>
<?= $form->field($model, 'dep3', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('dep3')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('dep3').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>
</div> 
<?php 
// echo $form->field($model, 'status', [
//     'inputOptions' => [
//         'placeholder' => $model->getAttributeLabel('status')
//     ],
//     'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('status').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
//     ])->label(false);
    ?>
<?php 
echo $form->field($model, 'status')->widget(Select2::classname(), [
    'data' => [1 => 'ใช้งาน',4 => 'ยกเลิก'],
    'language' => 'th',
    'options' => ['placeholder' => ' เลือกสถานะ'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false);

?>
</div> 

 
<fieldset class="text-right"> 
    <?= Html::resetButton('Reset', ['class' => 'btn btn-warning btn-lg']) ?> <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
</fieldset>

    <?php ActiveForm::end(); ?>

</div>
