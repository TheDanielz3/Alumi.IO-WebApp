<?php

use backend\models\Encarregadoeducacao;
use backend\models\Turma;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')
        ->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),
            ['prompt' => ' -- Select the User --'])
        ->label('ID - User') ?>

    <?= $form->field($model, 'id_encarregado_de_educacao')
        ->dropDownList(ArrayHelper::map(Encarregadoeducacao::find()->asArray()->all(), 'id', 'nome'),
            ['prompt' => ' -- Select the Guardian --'])
        ->label('ID - Encarregado de Educação ') ?>

    <?= $form->field($model, 'id_turma')
        ->dropDownList(ArrayHelper::map(Turma::find()->all(), 'id', 'anoLetra'),
            ['prompt' => ' -- Select the Class --'])
        ->label('ID - Turma ') ?>

    <?= $form->field($model, 'nome')
        ->textInput(['maxlength' => true])
        ->label('Nome do Estudante') ?>

    <?= $form->field($model, 'numero_estudante')
        ->textInput(['type' => 'number', 'min' => 1, 'max' => 1000000000])
        ->label('Número de Estudante') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
