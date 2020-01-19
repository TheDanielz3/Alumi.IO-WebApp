<?php


namespace api\resource;


class Tpc extends \api\models\Tpc
{
    public function fields()
    {
        return ['id','descricao','id_disciplina_turma','id_professor'];
    }
}