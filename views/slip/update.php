<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WebLink */

$this->title = 'Update : ' . $model->file;
$this->params['breadcrumbs'][] = ['label' => 'Salary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->file, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
