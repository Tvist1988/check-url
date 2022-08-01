<?php

use yii\db\Migration;

/**
 * Class m220730_121921_create_table_checks
 */
class m220730_121921_create_table_checks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

         $this->createTable('checks', [
             'id' => $this->primaryKey(),
             'host_id' => $this->integer()->notNull(),
             'code' => $this->integer()->notNull(),
             'attempt' => $this->integer()->notNull(),
             'date_time' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s')),
         ]);
         $this->addForeignKey('checks_hosts', 'checks', 'host_id', 'hosts', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('checks');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220730_121921_create_table_checks cannot be reverted.\n";

        return false;
    }
    */
}
