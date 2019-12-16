<?php


namespace api\modules\v1\controllers;


use api\resource\Disciplina;
use yii\rest\ActiveController;

class DisciplinaController extends ActiveController
{
    public $modelClass = Disciplina::class;
}