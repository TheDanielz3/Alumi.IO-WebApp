<?php


namespace api\modules\v1\controllers;


use api\resource\Professor;
use yii\rest\ActiveController;

class ProfessorController extends ActiveController
{
    public $modelClass = Professor::class;
}