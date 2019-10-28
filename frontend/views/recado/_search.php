<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RecadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Data') ?>

    <?= $form->field($model, 'Descrição') ?>

    <?= $form->field($model, 'Assinado') ?>

    <?= $form->field($model, 'id_Turma') ?>

    <?php // echo $form->field($model, 'id_Aluno') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
