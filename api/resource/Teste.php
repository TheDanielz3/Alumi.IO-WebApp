<?php


namespace api\resource;


class Teste extends \api\models\Teste
{
    public function fields()
    {
        return ['id','descricao','data_hora','id_disciplina_turma','id_professor'];
    }

}