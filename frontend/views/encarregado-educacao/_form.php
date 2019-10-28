<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EncarregadoEducacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encarregado-educacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Contacto')->textInput() ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
