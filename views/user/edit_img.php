<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin([
		'id' => 'pic-form',
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

<div>

<?php 
if (!empty($model->img)){
    $filename = Url::to('@webroot/uploads/user/').$model->img;
    if (file_exists($filename)) {
        // echo Url::to('@web/uploads/user/').$model->img;
        echo Html::img('@web/uploads/user/'.$model->img, ['alt' => 'My pic','class'=>'img-thumbnail']);
        // unlink($filename);
    }
    
}
?>
<div>
<?=$model->fname.$model->name.' '.$model->sname?>
</div>
<?= $form->field($model, 'img',[
   'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('img'),
        'onchange'=>'this.parentNode.nextSibling.value = this.value'
    ],
    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
])->fileInput()->label(false) ?>
</div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
