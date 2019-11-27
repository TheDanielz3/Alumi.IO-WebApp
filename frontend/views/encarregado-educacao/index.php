<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EncarregadoEducacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encarregado Educacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encarregado-educacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Encarregado Educacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'contacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
