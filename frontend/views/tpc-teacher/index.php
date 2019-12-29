<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TpcTeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'TPC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpc-teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create TPC', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'itemView' => '_tpc_item'
    ]); ?>


</div>
