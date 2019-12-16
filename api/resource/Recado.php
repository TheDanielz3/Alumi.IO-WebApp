<?php


namespace api\resource;


class Recado extends \api\models\Recado
{
     public function fields()
     {
         return ['id','data','descricao','assinado','professor','turma','aluno'];
     }

     public function extraFields()
     {
         return ['id_professor','id_turma','id_aluno'];
     }
}