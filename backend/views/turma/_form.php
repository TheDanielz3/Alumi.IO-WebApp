<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Turma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ano')->textInput(['type' => 'number', 'min' => 1, 'max' => 12]) ?>

    <?= $form->field($model, 'letra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
