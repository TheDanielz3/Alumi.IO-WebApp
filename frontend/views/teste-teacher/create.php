<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesteTeacher */

$this->title = 'Create Teste';
$this->params['breadcrumbs'][] = ['label' => 'Teste', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
