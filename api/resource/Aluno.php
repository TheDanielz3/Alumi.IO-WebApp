<?php


namespace api\resource;


class Aluno extends \api\models\Aluno
{
    public function fields()
    {
        return ['id','nome','numero_estudante','encarregadoDeEducacao','turma'];
    }

    public function extraFields()
    {
        return ['id_encarregado_de_educacao','id_turma'];
    }
}