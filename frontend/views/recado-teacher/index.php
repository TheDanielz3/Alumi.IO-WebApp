<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecadoTeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recado-teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'itemView' => '_recado_item'
    ]); ?>


</div>
