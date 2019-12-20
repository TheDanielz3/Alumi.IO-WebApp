<?php


namespace api\modules\v1\controllers;


use api\resource\Teste;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class TesteController extends ActiveController
{
    public $modelClass = Teste::class;

    /**
     * @param string $action
     * @param Teste $model
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if ((in_array($action, ['update', 'delete']) && $model->id_professor !== Yii::$app->user->id)
            && (in_array($action, ['update', 'delete']) && !Yii::$app->user->can('backendAccess'))) {
            throw new ForbiddenHttpException("You are not the owner of this Teste!");
        }
    }

}