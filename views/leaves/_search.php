<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeavesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leaves-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'date_write') ?>

    <?= $form->field($model, 'catalog_name') ?>

    <?= $form->field($model, 'due') ?>

    <?php // echo $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'date_total') ?>

    <?php // echo $form->field($model, 'dateOld_start') ?>

    <?php // echo $form->field($model, 'dateOld_end') ?>

    <?php // echo $form->field($model, 'dateOld_total') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'vtotal_a') ?>

    <?php // echo $form->field($model, 'vtotal_b') ?>

    <?php // echo $form->field($model, 'vtotal_c') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
