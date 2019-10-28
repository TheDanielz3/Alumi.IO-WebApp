<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tpc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descrição')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_Disciplina_Turmas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>