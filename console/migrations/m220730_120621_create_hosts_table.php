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
        $this->createTable('{{%hosts}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hosts}}');
    }
}
