<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeavesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leaves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaves-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Leaves', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'date_write',
            'catalog_name',
            'due',
            //'date_start',
            //'date_end',
            //'date_total',
            //'dateOld_start',
            //'dateOld_end',
            //'dateOld_total',
            //'address',
            //'vtotal_a',
            //'vtotal_b',
            //'vtotal_c',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
