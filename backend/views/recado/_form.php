<?php

use backend\models\Aluno;
use backend\models\Disciplinaturma;
use backend\models\Professor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Recado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'topico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'assinado')->textInput(['type' => 'number', 'max' => 1, 'min' => 0]) ?>

    <?= $form->field($model, 'data_hora')->widget(alexantr\datetimepicker\DateTimePicker::class) ?>

    <?= $form->field($model, 'id_disciplina_turma')
        ->dropDownList(ArrayHelper::map(Disciplinaturma::find()->all(), 'id', 'anoLetraDisciplina'),
            ['prompt' => ' -- Select the Disciplina_Turma --'])
        ->label('ID - Disciplina_Turma') ?>

    <?= $form->field($model, 'id_aluno')
        ->dropDownList(ArrayHelper::map(Aluno::find()->all(), 'id', 'nome'),
            ['prompt' => ' -- Select the Aluno --'])
        ->label('ID - Aluno') ?>

    <?= $form->field($model, 'id_professor')
        ->dropDownList(ArrayHelper::map(Professor::find()->all(), 'id', 'nome'),
            ['prompt' => ' -- Select the Professor --'])
        ->label('ID - Professor') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
