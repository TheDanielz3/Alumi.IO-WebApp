<?php

use app\models\TesteTeacher;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/**
 * @var $model TesteTeacher
 */
?>

<div>
    <a href="<?php echo Url::to(['teste-teacher/view','id' => $model->id]) ?> ">
        <h3><?php echo StringHelper::truncateWords($model->getEncondedDescricao(),'20') ?></h3>
    </a>
    <br>
    <p class="text-muted text-right">
        <small>
            At: <b> <?php echo Yii::$app->formatter->asDatetime($model->data_hora) ?></b>
        </small>
        <br>
    </p>
    <hr>
</div>
