<?php


namespace api\resource;


class Turma extends \api\models\Turma
{
    public function fields()
    {
        return ['id','ano','letra'];
    }

    public function extraFields()
    {
        return ['recados','disciplinaturmas','alunos'];
    }

}