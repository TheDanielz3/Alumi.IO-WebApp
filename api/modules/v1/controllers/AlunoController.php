<?php


namespace api\modules\v1\controllers;


use api\resource\Aluno;
use yii\rest\ActiveController;

class AlunoController extends ActiveController
{
    public $modelClass = Aluno::class;
}