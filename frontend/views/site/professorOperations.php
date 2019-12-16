<?php


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard Professor';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-operations">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('recado/index') ?>">Management Recados</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('recado/index') ?>">Management Recados</a></p>
    <p><a class="btn btn-lg btn-primary" href="<?= Url::toRoute('recado/index') ?>">Management Recados</a></p>

</div>
