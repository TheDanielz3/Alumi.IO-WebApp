<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TesteGuardianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teste';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-guardian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'itemView' => '_teste_item'
    ]); ?>


</div>
