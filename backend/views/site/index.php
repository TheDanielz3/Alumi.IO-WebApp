<?php

/* @var $this yii\web\View */

$this->title = 'Backend Office';

use yii\helpers\Html;
use yii\helpers\Url; ?>

<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <h2>Access Tables:</h2>
    <br>

    <div class="btn-group btn-group-toggle btn-group-lg">
        <a href="<?= Url::toRoute('aluno/index') ?>" class="btn btn-primary">Alunos</a>
        <a href="<?= Url::toRoute('disciplina/index') ?>" class="btn btn-primary">Disciplinas</a>
        <a href="<?= Url::toRoute('disciplinaturma/index') ?>" class="btn btn-primary">Disciplina_Turmas</a>
        <a href="<?= Url::toRoute('encarregadoeducacao/index') ?>" class="btn btn-primary">Encarregados de Educação</a>
        <a href="<?= Url::toRoute('professor/index') ?>" class="btn btn-primary">Professores</a>
    </div>
    <br><br>
    <div class="btn-group btn-group-toggle btn-group-lg">
        <a href="<?= Url::toRoute('recado/index') ?>" class="btn btn-primary">Recados</a>
        <a href="<?= Url::toRoute('teste/index') ?>" class="btn btn-primary">Testes</a>
        <a href="<?= Url::toRoute('tpc/index') ?>" class="btn btn-primary">TPC's</a>
        <a href="<?= Url::toRoute('turma/index') ?>" class="btn btn-primary">Turmas</a>
        <a href="<?= Url::toRoute('user/index') ?>" class="btn btn-primary">Users</a>
    </div>
</div>
