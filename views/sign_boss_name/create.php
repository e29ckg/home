<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WebLink */

$this->title = 'รายชื่อผู้ลงนาม';
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้ลงนาม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
