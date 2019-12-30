<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Dashboard Aluno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('teste-student/index') ?>">See Testes</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('tpc-student/index') ?>">See TPC's</a></p>

</div>