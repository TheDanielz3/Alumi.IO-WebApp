<?php


namespace api\modules\v1\controllers;


use api\resource\Tpc;
use yii\rest\ActiveController;

class TpcController extends ActiveController
{
    public $modelClass = Tpc::class;
}