<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DisciplinaTurma */

$this->title = 'Create Disciplina Turma';
$this->params['breadcrumbs'][] = ['label' => 'Disciplina Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-turma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
