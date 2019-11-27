<?php

use yii\db\Migration;

/**
 * Class m191122_123743_table_disciplina_turma
 */
class m191122_123743_table_disciplina_turma extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%disciplinaTurma}}', [
            'id' => $this->primaryKey(),
            'id_disciplina' => $this->integer(),
            'id_turma' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%disciplinaTurma}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_123743_table_disciplina_turma cannot be reverted.\n";

        return false;
    }
    */
}
