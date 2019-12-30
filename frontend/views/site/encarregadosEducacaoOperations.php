<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Dashboard Encarregados de Educação';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('recado-guardian/index') ?>">Recados</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('teste-guardian/index') ?>">Testes</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('tpc-guardian/index') ?>">TPC's</a></p>

</div>
