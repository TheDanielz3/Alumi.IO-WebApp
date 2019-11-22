<?php

use yii\db\Migration;

/**
 * Class m191122_122401_table_turma
 */
class m191122_122401_table_turma extends Migration
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

        $this->createTable('{{%turma}}', [
            'id' => $this->primaryKey(),
            'ano' => $this->integer()->notNull(),
            'letra' => $this->string(10)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%turma}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_122401_table_turma cannot be reverted.\n";

        return false;
    }
    */
}
