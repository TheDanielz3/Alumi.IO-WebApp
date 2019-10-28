<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teste */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teste-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descrição')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Data')->textInput() ?>

    <?= $form->field($model, 'hora')->textInput() ?>

    <?= $form->field($model, 'ID_Disciplina_Turmas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
