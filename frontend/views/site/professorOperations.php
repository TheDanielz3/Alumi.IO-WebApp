<?php


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard Professor';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="dashboard">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('recado-teacher/index') ?>">Management Recados</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('teste-teacher/index') ?>">Management Testes</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('tpc-teacher/index') ?>">Management TPC's</a></p>

</div>
