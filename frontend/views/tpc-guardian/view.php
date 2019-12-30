<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TpcGuardian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'TPC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tpc-guardian-view">

    <h1><?= $model->disciplinaTurma->getAnoLetraDisciplina() ?></h1>
    <br>
    <h4><?= $model->getEncondedDescricao() ?></h4>

</div>
