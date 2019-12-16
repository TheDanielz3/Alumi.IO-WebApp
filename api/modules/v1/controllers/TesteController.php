<?php


namespace api\modules\v1\controllers;


use api\resource\Teste;
use yii\rest\ActiveController;

class TesteController extends ActiveController
{
    public $modelClass = Teste::class;
}