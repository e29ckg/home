<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeavesCat */

$this->title = 'Update Leaves Cat: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Leaves Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leaves-cat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
