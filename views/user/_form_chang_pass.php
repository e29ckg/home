<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin([
		'id' => 'cletter-form',
		'options' => [
            'class' => 'smart-form',
            'novalidate'=>'novalidate',
            'enctype' => 'multipart/form-data'
        ],
        //'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}{input}{error}",
            'labelOptions' => ['class' => 'label'],
        ],
        'enableAjaxValidation' => true,
	]); ?>
<?='Id : '.$model->username?>
    <?= $form->field($model, 'password_hash',[
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('password_hash'),
        'value'=> '',
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('password_hash').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->passwordInput(['maxlength' => true]) ?>

    <footer>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </footer>

    <?php ActiveForm::end(); ?>

</div>
