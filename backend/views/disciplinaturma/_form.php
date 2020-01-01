<?php

use backend\models\Disciplina;
use backend\models\Professor;
use backend\models\Turma;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Disciplinaturma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplinaturma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_disciplina')
        ->dropDownList(ArrayHelper::map(Disciplina::find()->all(), 'id', 'nome'),
            ['prompt' => ' -- Select the User --'])
        ->label('ID - Disciplina') ?>

    <?= $form->field($model, 'id_turma')
        ->dropDownList(ArrayHelper::map(Turma::find()->all(), 'id', 'anoLetra'),
            ['prompt' => ' -- Select the Class --'])
        ->label('ID - Turma ') ?>

    <?= $form->field($model, 'id_professor')
        ->dropDownList(ArrayHelper::map(Professor::find()->asArray()->all(), 'id', 'nome'),
            ['prompt' => ' -- Select the Professor --'])
        ->label('ID - Professor') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
