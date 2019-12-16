<?php


namespace api\modules\v1\controllers;



use api\resource\Disciplinaturma;
use yii\rest\ActiveController;

class DisciplinaturmaController extends ActiveController
{
    public $modelClass = Disciplinaturma::class;
}