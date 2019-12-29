<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TpcTeacher */

$this->title = 'Create TPC';
$this->params['breadcrumbs'][] = ['label' => 'TPC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpc-teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
