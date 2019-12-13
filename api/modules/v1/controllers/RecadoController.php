<?php


namespace api\modules\v1\controllers;


use api\resource\Recado;
use yii\rest\ActiveController;

class RecadoController extends ActiveController
{
    public $modelClass = Recado::class;
}