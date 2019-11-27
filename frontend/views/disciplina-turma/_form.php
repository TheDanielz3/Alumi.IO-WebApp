<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DisciplinaTurma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_disciplina')->textInput() ?>

    <?= $form->field($model, 'id_turma')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
