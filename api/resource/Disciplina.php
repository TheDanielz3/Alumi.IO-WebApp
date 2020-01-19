<?php


namespace api\resource;


class Disciplina extends \api\models\Disciplina
{
    public function fields()
    {
        return ['id','nome'];
    }

}