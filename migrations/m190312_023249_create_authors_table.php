<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m190312_023249_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'date_of_death' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%authors}}');
    }
}
