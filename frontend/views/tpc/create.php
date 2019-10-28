<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpc */

$this->title = 'Create Tpc';
$this->params['breadcrumbs'][] = ['label' => 'Tpcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
