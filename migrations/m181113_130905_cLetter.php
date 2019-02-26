<?php

use yii\db\Migration;

/**
 * Class m181113_130905_cLetter
 */
class m181113_130905_cLetter extends Migration
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
 
        $this->createTable('c_letter', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'caid' => $this->integer()->notNull(),
            'file' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->insert('c_letter', [
            'name' => 'ชื่อเรื่อง',
            'caid' => 1,
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181113_130905_cLetter cannot be reverted.\n";
        $this->dropTable('c_letter');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181113_130905_cLetter cannot be reverted.\n";

        return false;
    }
    */
}
