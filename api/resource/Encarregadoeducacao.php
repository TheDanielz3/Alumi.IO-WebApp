<?php


namespace api\resource;


class Encarregadoeducacao extends \api\models\Encarregadoeducacao
{
    public function fields()
    {
        return ['id','nome','contacto'];
    }
}