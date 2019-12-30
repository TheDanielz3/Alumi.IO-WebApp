<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TesteGuardianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teste Guardians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-guardian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Teste Guardian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descricao',
            'data_hora',
            'id_disciplina_turma',
            'id_professor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
