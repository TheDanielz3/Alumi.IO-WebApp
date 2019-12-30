<?php

use app\models\Disciplinaturma;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecadoTeacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recado-teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'topico')->textInput(['maxlength' => true])->label('Subject') ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' => true])->label('Message') ?>

    <?= $form->field($model, 'id_disciplina_turma')->dropDownList(
        ArrayHelper::map(Disciplinaturma::getCurrentProfessorClassesIDS(Yii::$app->user->id), 'id', 'anoLetraDisciplina'),
        ['prompt' => ' -- Select the Class --', 'id' => 'id_disciplina_turma']
    )->label('Class') ?>

    <?= $form->field($model, 'id_aluno')->widget(DepDrop::class, [
        'options' => ['id' => 'id_aluno', 'prompt' => 'Select a Class First'],
        'data' => \app\models\Aluno::getSubCategories($model->getIDTurma($model->id_disciplina_turma)),
        'pluginOptions' => [
            'depends' => ['id_disciplina_turma'],
            'placeholder' => '-- Send to the whole Class --',
            'url' => Url::to(['site/sub-cat'])
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
