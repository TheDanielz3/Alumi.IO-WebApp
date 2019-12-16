<?php

use frontend\models\Aluno;
use frontend\models\Turma;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Recado */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->getId();
$alunos = Aluno::find()->all();
?>

<div class="recado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->widget(
            \dosamigos\datepicker\DatePicker::classname(), [
            'inline' => false,
            'clientOptions' => [
                    'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]
            ]);
    ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_turma')->dropDownList(
            ArrayHelper::map(Turma::find()->all(), 'id', 'letra','ano'),[
                'prompt' =>'Selecione a turma',]);
     ?>

    <?= $form->field($model, 'id_aluno')->dropDownList(
        ArrayHelper::map(Aluno::find()->all(), 'id', 'nome'),[
        'prompt' =>'Selecione a turma',]); ?>

    <?= $form->field($model, 'id_professor')->hiddenInput(['value'=> Yii::$app->user->identity->getId(), 'readonly' => true])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
