<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EncarregadoEducacao */

$this->title = 'Create Encarregado Educacao';
$this->params['breadcrumbs'][] = ['label' => 'Encarregado Educacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encarregado-educacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
