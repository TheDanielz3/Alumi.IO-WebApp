<?php


namespace api\resource;


class Disciplinaturma extends \api\models\Disciplinaturma
{
    public function fields()
    {
        return ['disciplina','turma'];
    }
}