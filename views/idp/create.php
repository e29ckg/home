<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Idp */

$this->title = 'Create Idp';
$this->params['breadcrumbs'][] = ['label' => 'Idps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
