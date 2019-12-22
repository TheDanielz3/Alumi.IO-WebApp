<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'topico')->textInput(['maxlength' => true])->label('Subject') ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' => true])->label('Message') ?>

    <?= $form->field($model, 'id_turma')->dropDownList(
        ArrayHelper::map(\app\models\Turma::find()->all(), 'id', 'anoLetra'),['prompt' => ' -- Select the Class --']
    )->label('Class') ?>

    <?= $form->field($model, 'id_aluno')->dropDownList(
        ArrayHelper::map(\app\models\Aluno::find()->all(), 'id', 'nome'),['prompt' => ' -- Select the Student --']
    )->label('Student') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
