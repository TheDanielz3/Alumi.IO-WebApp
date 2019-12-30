<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesteGuardian */

$this->title = 'Update Teste Guardian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teste Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teste-guardian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
