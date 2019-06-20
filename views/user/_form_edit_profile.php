<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin([
		'id' => 'edit-profile-form',
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

    <fieldset>
		<div class="row">
			<section class="col col-2">
				<label class="select">   
                    <?php echo $form->field($model, 'fname')->dropDownList(['นาย' => 'นาย', 'นางสาว' => 'นางสาว', 'นาง' => 'นาง']); ?>
				</label>
			</section>
			<section class="col col-5">
				<label class="input">
                    <?= $form->field($model, 'name',[
                            'inputOptions' => [
                            'placeholder' => $model->getAttributeLabel('name'),
                            ], ])->textInput(['maxlength' => true]) ?>
				</label>
			</section>

			<section class="col col-5">
			    <label class="input">
                    <?= $form->field($model, 'sname',[
                        'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('sname'),
                            ], ])->textInput(['maxlength' => true]) ?>
				</label>
			</section>
		</div>

            <section>
				<label for="id_card" class="input">
                    <?= $form->field($model, 'id_card',[
                            'inputOptions' => [
                            'placeholder' => $model->getAttributeLabel('id_card'),
                                ], ])->textInput(['maxlength' => true]) ?>
				</label>
			</section>

            <section>
				<label for="dep" class="input">
                    <?= $form->field($model, 'dep',[
                        'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('dep'),
                            ], ])->textInput(['maxlength' => true]) ?>
				</label>
			</section>

			<section>
				<label for="address" class="input">
                    <?= $form->field($model, 'address',[
                        'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('address'),
                            ], ])->textInput(['maxlength' => true]) ?>
				</label>
			</section>
            <section>
				<label for="phone" class="input">
                    <?= $form->field($model, 'phone',[
                        'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('phone'),
                            ], ])->textInput(['maxlength' => true]) ?>
				</label>
			</section>
								<!-- <section>
									<label class="textarea"> 										
										<textarea rows="3" name="info" placeholder="Additional info"></textarea> 
									</label>
								</section> -->
	</fieldset>

    <footer>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </footer>

    <?php ActiveForm::end(); ?>

</div>
