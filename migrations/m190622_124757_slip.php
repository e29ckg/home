<?php

use yii\db\Migration;

/**
 * Class m190622_124757_slip
 */
class m190622_124757_slip extends Migration
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
 
        $this->createTable('slip', [
            'slip_id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'slip_month' => $this->string(),
            'slip_year' => $this->string(),
            'slip_year' => $this->string(),
            'slip_bank' => $this->string(),
            'slip_salary' => $this->string(),
            'slip_salary2' => $this->string(),
            'slip_position' => $this->string(),
            'slip_position2' => $this->string(),
            'slip_special' => $this->string(),
            'slip_special2' => $this->string(),
            'slip_spem' => $this->string(),
            'slip_spem2' => $this->string(),
            'slip_ptk' => $this->string(),
            'slip_ptk2' => $this->string(),
            'slip_future' => $this->string(),
            'slip_future2' => $this->string(),
            'slip_full' => $this->string(),
            'slip_juscoop' => $this->string(),
            'slip_tax' => $this->string(),
            'slip_cremation' => $this->string(),
            'slip_aia' => $this->string(),
            'slip_kasikorn' => $this->string(),
            'slip_aom' => $this->string(),
            'slip_justice' => $this->string(),
            'slip_kbk' => $this->string(),
            'slip_kbk2' => $this->string(),
            'file' => $this->string(),
            'slip_create' => $this->string(),
            'slip_update' => $this->string(),
            
        ], $tableOptions);
        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('slip');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190622_124757_slip cannot be reverted.\n";

        return false;
    }
    */
}
