<?php

use yii\db\Migration;

/**
 * Class m191122_123450_table_teste
 */
class m191122_123450_table_teste extends Migration
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

        $this->createTable('{{%teste}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string(45)->notNull(),
            'data_hora' => $this->integer()->notNull(),
            'id_disciplina_turma' => $this->integer()->notNull(),
            'id_professor' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teste}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_123450_table_teste cannot be reverted.\n";

        return false;
    }
    */
}
