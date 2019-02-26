<?php

use yii\db\Migration;

/**
 * Class m190226_142333_salary
 */
class m190226_142333_salary extends Migration
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
 
        $this->createTable('salary', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'file' => $this->string(),
            'create_at' => $this->dateTime(),
            'update_at' => $this->dateTime(),
        ], $tableOptions);

        $this->insert('salary', [
            'id' => '1',
            'user_id' => '1',
            'create_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('salary');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190226_142333_salary cannot be reverted.\n";

        return false;
    }
    */
}
