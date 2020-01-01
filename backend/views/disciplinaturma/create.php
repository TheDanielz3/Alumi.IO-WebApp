<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplinaturma */

$this->title = 'Create Disciplinaturma';
$this->params['breadcrumbs'][] = ['label' => 'Disciplinaturmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplinaturma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
