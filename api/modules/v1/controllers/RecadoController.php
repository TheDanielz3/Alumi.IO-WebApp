<?php


namespace api\modules\v1\controllers;


use api\resource\Recado;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class RecadoController extends ActiveController
{
    public $modelClass = Recado::class;

    /**
     * @param string $action
     * @param Recado $model
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if ((in_array($action, ['update', 'delete','view']) && $model->id_professor !== Yii::$app->user->id)
            && (in_array($action, ['update', 'delete','view']) && !Yii::$app->user->can('backendAccess'))) {
            throw new ForbiddenHttpException("You are not the owner of this Recado!");
        }
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        return Recado::find()->andWhere(['id_professor' => Yii::$app->user->id])->all();
    }


    public function actionAssinados()
    {
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->andwhere("assinado=1")->andwhere(["id_professor" => Yii::$app->user->id])->all();
        return $recs;
    }

    public function actionPorassinar()
    {
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->andwhere("assinado=0")->andwhere(["id_professor" => Yii::$app->user->id])->all();
        return $recs;
    }

}