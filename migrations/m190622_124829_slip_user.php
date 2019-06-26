<?php

use yii\db\Migration;

/**
 * Class m190622_124829_slip_user
 */
class m190622_124829_slip_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
 
        $this->createTable('slip_user', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'user_type' => $this->string(),
            'status' => $this->integer(11),
        ], $tableOptions);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('slip_user');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190622_124829_slip_user cannot be reverted.\n";

        return false;
    }
    */
}
