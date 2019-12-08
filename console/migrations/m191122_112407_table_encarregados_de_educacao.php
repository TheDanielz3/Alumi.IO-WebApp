<?php

use yii\db\Migration;

/**
 * Class m191122_112407_table_encarregados_de_educacao
 */
class m191122_112407_table_encarregados_de_educacao extends Migration
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

        $this->createTable('{{%encarregadoEducacao}}', [
            'id' => $this->primaryKey(),
            'contacto' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%encarregadoEducacao}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_112407_table_encarregados_de_educacao cannot be reverted.\n";

        return false;
    }
    */
}
