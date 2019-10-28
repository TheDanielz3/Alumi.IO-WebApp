<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Recado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Data')->textInput() ?>

    <?= $form->field($model, 'Descrição')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Assinado')->textInput() ?>

    <?= $form->field($model, 'id_Turma')->textInput() ?>

    <?= $form->field($model, 'id_Aluno')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
