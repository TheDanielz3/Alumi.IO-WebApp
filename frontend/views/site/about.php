<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Alumio is a project created by:</p>
    <p>Daniel Correia Batista: 2171836</p>
    <?php
    echo "Algum hummor que nos acompanhou no nosso projeto";
    echo Html::img('img/source.gif');
    ?>

    <?php echo Html::img('img/source.gif');?>
</div>
