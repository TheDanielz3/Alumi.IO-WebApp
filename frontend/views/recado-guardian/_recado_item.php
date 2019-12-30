<?php

use app\models\RecadoTeacher;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/**
 * @var $model RecadoTeacher
 */
?>

<div>
    <a href="<?php echo Url::to(['recado-guardian/view','id' => $model->id]) ?> ">
        <h3><?php echo  $model->getEncondedTopico() ?></h3>
    </a>
    <div>
        <?php echo StringHelper::truncateWords($model->getEncondedDescricao(),'20')  ?>
    </div>
    <br>
    <p class="text-muted text-right">
        <small>
            Class:  <b><?php echo $model->disciplinaTurma->getAnoLetraDisciplina() ?></b>
            <br>
            Sended: <b> <?php echo Yii::$app->formatter->asRelativeTime($model->data_hora) ?></b>
        </small>
        <br>
    </p>
    <hr>
</div>
