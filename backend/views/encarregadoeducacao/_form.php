<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Encarregadoeducacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encarregadoeducacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')
        ->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),
            ['prompt' => ' -- Select the User --'])
        ->label('ID - User') ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto')->textInput(['type' => 'number', 'min' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
