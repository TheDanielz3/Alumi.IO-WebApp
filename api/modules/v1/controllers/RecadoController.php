<?php


namespace api\modules\v1\controllers;


use api\resource\Recado;
use yii\rest\ActiveController;

class RecadoController extends ActiveController
{
    public $modelClass = Recado::class;

    public function actionAssinados()
    {
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->andwhere("assinado=1")->all();
        return $recs;
    }

    public function actionPorassinar()
    {
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->andwhere("assinado=0")->all();
        return $recs;
    }
}