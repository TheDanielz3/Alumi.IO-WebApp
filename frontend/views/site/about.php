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
    <p>Rodrigo Manuel Alves Rodrigues: 2180620</p>
    <p>Samuel Pires Brito: 2180657</p>
    <?php
    echo "Algum humor que nos acompanhou no nosso projeto";
    echo '<br>';
    //Todo: Add memes of programing
    echo Html::img('img/source.gif');
    ?>
</div>
