<?php


namespace api\modules\v1\controllers;


use api\resource\Disciplina;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class DisciplinaController extends ActiveController
{
    public $modelClass = Disciplina::class;

    public function checkAccess($action, $model = null, $params = [])
    {
        // You could completely block some actions
        if (in_array($action, ['delete', 'create', 'update'])) {

            throw new ForbiddenHttpException(
                Yii::t('app',
                    "You are not allowed to make the action {action} in this model.",
                    ['action' => $action]
                )
            );

        }
    }
}