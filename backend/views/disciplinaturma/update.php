<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplinaturma */

$this->title = 'Update Disciplinaturma: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Disciplinaturmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disciplinaturma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
