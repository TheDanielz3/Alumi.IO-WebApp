<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TesteStudentSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'itemView' => '_teste_item'
    ]); ?>


</div>
