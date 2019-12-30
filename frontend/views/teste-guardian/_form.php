<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TesteGuardian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teste-guardian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_hora')->textInput() ?>

    <?= $form->field($model, 'id_disciplina_turma')->textInput() ?>

    <?= $form->field($model, 'id_professor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
