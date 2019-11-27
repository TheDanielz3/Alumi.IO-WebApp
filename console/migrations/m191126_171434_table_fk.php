<?php

use yii\db\Migration;

/**
 * Class m191126_171434_table_fk
 */
class m191126_171434_table_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_professor_user','professor','id','user','id','CASCADE');
        $this->addForeignKey('fk_professor_disciplina','professor','id_disciplina','disciplina','id','CASCADE');
        $this->addForeignKey('fk_encarregado_user', 'encarregadoEducacao', 'id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk_disciplinaTurma_turma', 'disciplinaTurma', 'id_turma', 'turma', 'id', 'CASCADE');
        $this->addForeignKey('fk_disciplinaTurma_disciplina', 'disciplinaTurma', 'id_disciplina', 'disciplina', 'id', 'CASCADE');
        $this->addForeignKey('fk_tpc_disciplinaTurma', 'tpc', 'id_disciplina_turma', 'disciplinaturma', 'id', 'CASCADE');
        $this->addForeignKey('fk_teste_disciplinaTurma', 'teste', 'id_disciplina_turma', 'disciplinaturma', 'id', 'CASCADE');
        $this->addForeignKey('fk_aluno_User', 'aluno', 'id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk_aluno_EncarregadoEducacao', 'aluno', 'id_encarregado_de_educacao', 'encarregadoeducacao', 'id', 'CASCADE');
        $this->addForeignKey('fk_aluno_Turma', 'aluno', 'id_turma', 'turma', 'id', 'CASCADE');
        $this->addForeignKey('fk_recado_Turma', 'recado', 'id_turma', 'turma', 'id', 'CASCADE');
        $this->addForeignKey('fk_recado_Aluno', 'recado', 'id_aluno', 'aluno', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_professor_user','professor');
        $this->dropForeignKey('fk_professor_disciplina','professor');
        $this->dropForeignKey('fk_encarregado_user', 'encarregadoEducacao');
        $this->dropForeignKey('fk_disciplinaTurma_turma', 'disciplinaTurma');
        $this->dropForeignKey('fk_disciplinaTurma_disciplina', 'disciplinaTurma');
        $this->dropForeignKey('fk_tpc_disciplinaTurma', 'tpc');
        $this->dropForeignKey('fk_teste_disciplinaTurma', 'teste');
        $this->dropForeignKey('fk_aluno_User', 'aluno');
        $this->dropForeignKey('fk_aluno_EncarregadoEducacao', 'aluno');
        $this->dropForeignKey('fk_aluno_Turma', 'aluno');
        $this->dropForeignKey('fk_recado_Turma', 'turma');
        $this->dropForeignKey('fk_recado_Aluno', 'turma');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191126_171434_table_fk cannot be reverted.\n";

        return false;
    }
    */
}
