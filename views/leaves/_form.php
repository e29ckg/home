<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Leaves */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leaves-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'date_write')->textInput() ?>

    <?= $form->field($model, 'catalog_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

    <?= $form->field($model, 'date_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateOld_start')->textInput() ?>

    <?= $form->field($model, 'dateOld_end')->textInput() ?>

    <?= $form->field($model, 'dateOld_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vtotal_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vtotal_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vtotal_c')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
