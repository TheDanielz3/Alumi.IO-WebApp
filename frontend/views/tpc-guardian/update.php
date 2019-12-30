<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TpcGuardian */

$this->title = 'Update Tpc Guardian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tpc Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpc-guardian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
