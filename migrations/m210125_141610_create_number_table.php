<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%number}}`.
 */
class m210125_141610_create_number_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%number}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'number' => $this->integer()->notNull(),
            'numbers' => $this->text()->notNull(),
            'number_index' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-number-user_id',
            'number',
            'user_id'
        );

        $this->addForeignKey(
            'fk-number-user_id',
            'number',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-number-user_id',
            'number'
        );

        $this->dropIndex(
            'idx-number-user_id',
            'number'
        );

        $this->dropTable('{{%number}}');
    }
}
