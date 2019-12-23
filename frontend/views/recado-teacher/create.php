<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecadoTeacher */

$this->title = 'Create Recado';
$this->params['breadcrumbs'][] = ['label' => 'Recados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recado-teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
