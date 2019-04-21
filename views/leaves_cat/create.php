<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeavesCat */

$this->title = 'Create Leaves Cat';
$this->params['breadcrumbs'][] = ['label' => 'Leaves Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaves-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
