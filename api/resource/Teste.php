<?php


namespace api\resource;


class Teste extends \api\models\Teste
{
    public function fields()
    {
        return ['id','descricao','datahora','disciplinaTurma','professor'];
    }

    public function extraFields()
    {
        return ['id_professor','id_disciplinaTurma','data_hora'];
    }
}