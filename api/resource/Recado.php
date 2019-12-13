<?php


namespace api\resource;


class Recado extends \api\models\Recado
{
     public function fields()
     {
         return ['id','data','descricao','assinado'];
     }

     public function extraFields()
     {
         return ['id_turma'	,'id_aluno','id_professor'];
     }
}