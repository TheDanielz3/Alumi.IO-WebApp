<?php

use yii\db\Migration;

/**
 * Class m191122_122618_table_recado
 */
class m191122_122618_table_recado extends Migration
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

        $this->createTable('{{%recado}}', [
            'id' => $this->primaryKey(),
            'data' => $this->dateTime()->notNull(),
            'descricao' => $this->string(150)->notNull(),
            'assinado' => $this->double()->notNull()->defaultValue(0),
            'id_turma' => $this->integer(),
            'id_aluno' => $this->integer(),
            'id_professor' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recado}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_122618_table_recado cannot be reverted.\n";

        return false;
    }
    */
}
