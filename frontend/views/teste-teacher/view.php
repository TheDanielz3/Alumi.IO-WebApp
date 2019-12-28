<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TesteTeacher */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teste', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="teste-teacher-view">

    <h1><?= $model->disciplinaTurma->getAnoLetraDisciplina()  ?></h1>

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

    <p class="text-muted">
        <small>
            At: <b> <?php echo Yii::$app->formatter->asDatetime($model->data_hora) ?></b>
        </small>
    </p>


    <h4><?= $model->getEncondedDescricao() ?></h4>

</div>
