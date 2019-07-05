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

    <?= $form->field($model, 'username',[
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('username')
    ],
    'template' => '<section class=""><label class="label">{label}</label> <label class="input"> <i class="icon-append fa fa-user"></i>{input}<b class="tooltip tooltip-top-right">'.$model->getAttributeLabel('username').'</b></label><em for="name" class="invalid">{error}{hint}</em></section>'
    ])->textInput(['maxlength' => true]) ?>

<fieldset>
	<div class="row">
		<section class="col col-2">
			<label class="select">   
                <?php echo $form->field($modelP, 'fname')->dropDownList(['นาย' => 'นาย', 'นางสาว' => 'นางสาว', 'นาง' => 'นาง']); ?>
			</label>
		</section>
		<section class="col col-5">
			<label class="input">
                <?= $form->field($modelP, 'name',['inputOptions' => ['placeholder' => $modelP->getAttributeLabel('name')], ])->textInput(['maxlength' => true]) ?>
			</label>
		</section>
		<section class="col col-5">
			<label class="input">
                <?= $form->field($modelP, 'sname',[
                    'inputOptions' => [
                        'placeholder' => $modelP->getAttributeLabel('sname'),
                        ], 
                    ])->textInput(['maxlength' => true]) 
                ?>
			</label>
		</section>
	</div>
    <div>
        <section>
			<label for="id_card" class="input">
                <?= $form->field($modelP, 'id_card',[
                    'inputOptions' => [
                        'placeholder' => $modelP->getAttributeLabel('id_card'),
                        ],
                    ])->textInput(['maxlength' => true]) 
                ?>
			</label>
		</section>
    </div>
    <div>
        <section>
			<label for="dep" class="input">
                <?= $form->field($modelP, 'dep',[
                    'inputOptions' => [
                        'placeholder' => $modelP->getAttributeLabel('dep'),
                        ],
                    ])->textInput(['maxlength' => true])
                ?>
			</label>
		</section>
    </div>
    <div>
		<section>
			<label for="address" class="input">
                <?= $form->field($modelP, 'address',[
                        'inputOptions' => [
                            'placeholder' => $modelP->getAttributeLabel('address'),
                            ],
                        ])->textInput(['maxlength' => true])
                ?>
			</label>
		</section>
    </div>
    <div>
        <section>
		    <label for="phone" class="input">
                <?= $form->field($modelP, 'phone',[
                        'inputOptions' => [
                            'placeholder' => $modelP->getAttributeLabel('phone'),
                            ],
                        ])->textInput(['maxlength' => true]) 
                ?>
			</label>
		</section>
    </div>
								<!-- <section>
									<label class="textarea"> 										
										<textarea rows="3" name="info" placeholder="Additional info"></textarea> 
									</label>
								</section> -->
    <div>
        
            <?= $form->field($modelP, 'img',[
                    'inputOptions' => [
                        'placeholder' => $modelP->getAttributeLabel('img'),
                        'onchange'=>'this.parentNode.nextSibling.value = this.value'
                    ],
                    'template' => '<section><label class="label">{label}</label><div class="input input-file"><span class="button">{input}Browse</span><input type="text" placeholder="Include some files" readonly=""><div class="invalid">{error}{hint}</div></div></section>'
                ])->fileInput()->label(false) 
            ?>
    </div>
</fieldset>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
