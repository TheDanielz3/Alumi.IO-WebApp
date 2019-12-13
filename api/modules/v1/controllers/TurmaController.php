<?php


namespace api\modules\v1\controllers;


use api\resource\Turma;
use yii\rest\ActiveController;

class TurmaController extends ActiveController
{
    public $modelClass = Turma::class;
}