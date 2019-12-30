<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TpcGuardian */

$this->title = 'Create Tpc Guardian';
$this->params['breadcrumbs'][] = ['label' => 'Tpc Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpc-guardian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
