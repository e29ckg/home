<?php

use yii\helpers\Html;
use app\models\Slip;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
// use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\WebLink */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- <div class="web-link-form"> -->

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
    ]);  
    ?>
<p><?=Slip::DateThai_month_full(date("Y-m-d")).' '.$_GET['id']?></p>

<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
    <div role="content">
		<div class="widget-body no-padding">  
        <header>
			รับ
        </header>  
        <fieldset>
        <?= $form->field($model, 'slip_bank', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('slip_bank'),
        // 'value' => isset($modelSlip->slip_bank) ? $modelSlip->slip_bank : '',
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_bank').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>
    <?= $form->field($model, 'slip_salary', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('slip_salary'),
        // 'value' => isset($modelSlip->slip_salary) ? $modelSlip->slip_salary : '',
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_salary').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>
    <?= $form->field($model, 'slip_salary2', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('slip_salary2'),
        // 'value' => isset($modelSlip->slip_salary2) ? $modelSlip->slip_salary2 : '',
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_salary2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->label(false);
    ?>
    <?= $form->field($model, 'slip_position', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_position'),
            // 'value' => isset($modelSlip->slip_position) ? $modelSlip->slip_position : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_position').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_position2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_position2'),
            // 'value' => isset($modelSlip->slip_position2) ? $modelSlip->slip_position2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_position2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_special', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_special'),
            // 'value' => isset($modelSlip->slip_special) ? $modelSlip->slip_special : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_special').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_special2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_special2'),
            // 'value' => isset($modelSlip->slip_special2) ? $modelSlip->slip_special2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_special2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_spem', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_spem'),
            // 'value' => isset($modelSlip->slip_spem) ? $modelSlip->slip_spem : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_spem').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_spem2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_spem2'),
            // 'value' => isset($modelSlip->slip_spem2) ? $modelSlip->slip_spem2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_spem2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_ptk', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_ptk'),
            // 'value' => isset($modelSlip->slip_ptk) ? $modelSlip->slip_ptk : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_ptk').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_ptk2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_ptk2'),
            // 'value' => isset($modelSlip->slip_ptk2) ? $modelSlip->slip_ptk2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_ptk2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_future', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_future'),
            // 'value' => isset($modelSlip->slip_future) ? $modelSlip->slip_future : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_future').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_future2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_future2'),
            // 'value' => isset($modelSlip->slip_future2) ? $modelSlip->slip_future2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_future2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_full', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_full'),
            // 'value' => isset($modelSlip->slip_full) ? $modelSlip->slip_full : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_full').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>

        <fieldset>
    </div>
    </div>

</article>

    
<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">

    <div role="content">
		<div class="widget-body no-padding">   
        <header>
			จ่าย
        </header> 
        <fieldset>    
        <?= $form->field($model, 'slip_juscoop', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_juscoop'),
            // 'value' => isset($modelSlip->slip_juscoop) ? $modelSlip->slip_juscoop : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_juscoop').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_tax', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_tax'),
            // 'value' => isset($modelSlip->slip_tax) ? $modelSlip->slip_tax : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_tax').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_cremation', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_cremation'),
            // 'value' => isset($modelSlip->slip_cremation) ? $modelSlip->slip_cremation : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_cremation').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_aia', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_aia'),
            // 'value' => isset($modelSlip->slip_aia) ? $modelSlip->slip_aia : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_aia').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_kasikorn', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_kasikorn'),
            // 'value' => isset($modelSlip->slip_kasikorn) ? $modelSlip->slip_kasikorn : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_kasikorn').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_aom', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_aom'),
            // 'value' => isset($modelSlip->slip_aom) ? $modelSlip->slip_aom : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_aom').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_justice', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_justice'),
            // 'value' => isset($modelSlip->slip_justice) ? $modelSlip->slip_justice : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_justice').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_kbk', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_kbk'),
            // 'value' => isset($modelSlip->slip_kbk) ? $modelSlip->slip_kbk : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_kbk').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_kbk2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_kbk2'),
            // 'value' => isset($modelSlip->slip_kbk2) ? $modelSlip->slip_kbk2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_kbk2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_spem', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_spem'),
            // 'value' => isset($modelSlip->slip_spem) ? $modelSlip->slip_spem : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_spem').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_spem2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_spem2'),
            // 'value' => isset($modelSlip->slip_spem2) ? $modelSlip->slip_spem2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_spem2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_spem', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_spem'),
            // 'value' => isset($modelSlip->slip_spem) ? $modelSlip->slip_spem : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_spem').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>
    <?= $form->field($model, 'slip_spem2', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('slip_spem2'),
            // 'value' => isset($modelSlip->slip_spem2) ? $modelSlip->slip_spem2 : '',
        ],
        'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-usd"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('slip_spem2').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
        ])->label(false);
    ?>

<fieldset>
    </div>
    </div>
</article>
<div>
<fieldset class="text-right"> 
    <?= Html::submitButton('Update', ['class' => 'btn btn-primary btn-lg']) ?>
</fieldset>

    <?php ActiveForm::end(); ?>

<!-- </div> -->
