<?php


namespace api\resource;


class Aluno extends \api\models\Aluno
{
    public function fields()
    {
        return ['id','id_encarregado_de_educacao','id_turma','nome','numero_estudante'];
    }
}