<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecadoTeacher */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recado-teacher-view">

    <h1><?= $model->getEncondedTopico() ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br>

    <p class="text-muted">
        <small>
            Sended: <b> <?php echo Yii::$app->formatter->asRelativeTime($model->data_hora) ?></b>
        </small>
        <br>
        <?php if ($model->disciplinaTurma !== null) { ?>
            <small>
                To the class: <b> <?php echo $model->disciplinaTurma->getAnoLetraDisciplina() ?></b>
            </small>
            <br>
        <?php } ?>
        <?php if ($model->aluno !== null) { ?>
            <small>
                To the student: <b> <?php echo $model->aluno->nome ?></b>
            </small>
            <br>
        <?php } ?>
    </p>

    <div>
        <h4>
            <?php
            echo $model->getEncondedDescricao();
            ?>
        </h4>
    </div>

    <br>
    <p class="text-muted">
        <small>
            By: <b> <?php echo $model->professor->nome ?></b>
        </small>
    </p>

</div>
