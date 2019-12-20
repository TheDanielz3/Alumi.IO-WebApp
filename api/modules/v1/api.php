<?php

namespace api\modules\v1;

use api\models\Recado;
use api\models\Teste;
use api\models\Tpc;
use common\models\User;
use Yii;
use yii\base\Module;
use yii\filters\auth\HttpBasicAuth;
use yii\web\ForbiddenHttpException;

/**
 * api module definition class
 */
class api extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        Yii::$app->user->enableSession = false;
    }

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

}
