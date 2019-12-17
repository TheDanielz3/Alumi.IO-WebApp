<?php


namespace api\modules\v1\controllers;


use api\resource\Recado;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class RecadoController extends ActiveController
{
    public $modelClass = Recado::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }


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