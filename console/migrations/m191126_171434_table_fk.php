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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_professor_user','professor');
        $this->dropForeignKey('fk_professor_disciplina','professor');
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
