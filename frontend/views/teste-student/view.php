<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TesteStudent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Testes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="teste-student-view">

    <h1><?= $model->disciplinaTurma->getAnoLetraDisciplina()  ?></h1>

    <h3 class="text-muted">
        <small>
            At: <b> <?php echo Yii::$app->formatter->asDatetime($model->data_hora) ?></b>
        </small>
    </h3>
    <br>
    <h4> Description: <?= $model->getEncondedDescricao() ?></h4>

</div>
