<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecadoGuardian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recado-guardian-view">

    <h1>Topic: <?= $model->getEncondedTopico() ?></h1>

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
        <?php } elseif ($model->aluno == null) { ?>
            <small>
                <b>To the whole class</b>.
            </small>
        <?php } ?>
    </p>
    <br>

    <div>
        <h4> Description:
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

    <p>
        <?php
        if ($model->assinado == 0 and $model->id_aluno !== null) {
            echo Html::a('Marcar como Lido', ['update', 'id' => $model->id], ['class' => 'btn btn-info', 'data-method' => 'POST']);
        }
        ?>

    </p>

</div>
