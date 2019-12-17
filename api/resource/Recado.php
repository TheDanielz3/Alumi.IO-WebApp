<?php


namespace api\resource;


class Recado extends \api\models\Recado
{
     public function fields()
     {
         return ['id','data','descricao','assinado','turma','aluno','professor'];
     }

     public function extraFields()
     {
         return ['id_professor','id_turma','id_aluno'];
     }
}