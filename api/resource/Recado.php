<?php


namespace api\resource;


class Recado extends \api\models\Recado
{
     public function fields()
     {
         return ['id','topico','descricao','data_hora','assinado','id_professor','id_disciplina_turma','id_aluno'];
     }

     public function extraFields()
     {
         return ['datahora'];
     }

}