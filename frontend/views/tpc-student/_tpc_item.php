<?php

use app\models\TpcStudent;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/**
 * @var $model TpcStudent
 */
?>

<div>
    <a href="<?php echo Url::to(['tpc-student/view','id' => $model->id]) ?> ">
        <h3><?php echo StringHelper::truncateWords($model->getEncondedDescricao(),'20') ?></h3>
    </a>
    <br>
    <p class="text-muted text-right">
        <small>
            To: <b> <?php echo $model->disciplinaTurma->getAnoLetraDisciplina() ?></b>
        </small>
        <br>
    </p>
    <hr>
</div>
