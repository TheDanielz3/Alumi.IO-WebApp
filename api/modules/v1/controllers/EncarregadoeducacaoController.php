<?php


namespace api\modules\v1\controllers;


use api\resource\Encarregadoeducacao;
use yii\rest\ActiveController;

class EncarregadoeducacaoController extends ActiveController
{
    public $modelClass = Encarregadoeducacao::class;
}