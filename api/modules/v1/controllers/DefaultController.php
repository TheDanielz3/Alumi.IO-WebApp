<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class DefaultController extends ActiveController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $modelClass = 'api\models\Country';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
