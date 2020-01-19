<?php


namespace api\modules\v1\controllers;


use api\resource\Tpc;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class TpcController extends ActiveController
{
    public $modelClass = Tpc::class;

    /**
     * @param string $action
     * @param Tpc $model
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if ((in_array($action, ['update', 'delete']) && $model->id_professor !== Yii::$app->user->id)
            && (in_array($action, ['update', 'delete']) && !Yii::$app->user->can('backendAccess'))) {
            throw new ForbiddenHttpException("You are not the owner of this TPC!");
        }
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        return Tpc::find()->andWhere(['id_professor' => Yii::$app->user->id])->all();
    }

}