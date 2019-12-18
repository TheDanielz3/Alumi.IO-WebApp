<?php


namespace api\resource;


class Tpc extends \api\models\Tpc
{
    public function fields()
    {
        return ['id','descricao','disciplinaTurma','professor'];
    }

    public function extraFields()
    {
        return ['id_disciplinaturma','id_professor'];
    }
}