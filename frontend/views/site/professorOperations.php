<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Operation Professor';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-operations">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><a class="btn btn-default" href="<?= Url::toRoute('recado/index') ?>">Recados</a></p>

</div>
