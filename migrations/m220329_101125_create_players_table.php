<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%players}}`.
 */
class m220329_101125_create_players_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('players', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->null(),
            'modified_at' => $this->timestamp()->null(),
            'deleted_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('players');
    }
}
