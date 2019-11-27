<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DisciplinaTurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disciplina Turmas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-turma-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Disciplina Turma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_disciplina',
            'id_turma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
