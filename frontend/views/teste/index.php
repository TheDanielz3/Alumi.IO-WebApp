<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Teste', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descricao',
            'data',
            'hora',
            'id_disciplina_turma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
