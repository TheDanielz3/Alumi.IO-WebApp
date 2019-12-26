<?php


namespace api\resource;


class Recado extends \api\models\Recado
{
     public function fields()
     {
         return ['id','datahora','descricao','assinado','disciplinaTurma','aluno','professor'];
     }

     public function extraFields()
     {
         return ['id_professor','id_disciplina_turma','id_aluno','data_hora'];
     }

}