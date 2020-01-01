<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EncarregadoeducacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encarregadoeducacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encarregadoeducacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Encarregadoeducacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nome',
            'contacto',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
