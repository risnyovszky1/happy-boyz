<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%training}}`.
 */
class m220226_135312_create_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trainings', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date' => $this->timestamp(),
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
        $this->dropTable('trainings');
    }
}
