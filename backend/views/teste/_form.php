<?php

use backend\models\Disciplinaturma;
use backend\models\Professor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Teste */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teste-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_hora')->widget(alexantr\datetimepicker\DateTimePicker::class) ?>

    <?= $form->field($model, 'id_disciplina_turma')
        ->dropDownList(ArrayHelper::map(Disciplinaturma::find()->all(), 'id', 'anoLetraDisciplina'),
            ['prompt' => ' -- Select the Disciplina_Turma --'])
        ->label('ID - Disciplina_Turma') ?>

    <?= $form->field($model, 'id_professor')
        ->dropDownList(ArrayHelper::map(Professor::find()->all(), 'id', 'nome'),
            ['prompt' => ' -- Select the Professor --'])
        ->label('ID - Professor') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
