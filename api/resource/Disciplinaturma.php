<?php


namespace api\resource;


class Disciplinaturma extends \api\models\Disciplinaturma
{
    public function fields()
    {
        return ['id','id_turma','id_disciplina','id_professor'];
    }
    public function extraFields()
    {
        return ['disciplina', 'turma'];
    }
}