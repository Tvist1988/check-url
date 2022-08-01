<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hosts}}`.
 */
class m220730_120621_create_hosts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('hosts', [
            'id' => $this->primaryKey(),
            'url' => $this->string(128)->notNull(),
            'interval' => $this->integer()->notNull(),
            'repeat' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('hosts');
    }
}
