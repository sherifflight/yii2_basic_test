<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedbacks}}`.
 */
class m210524_222042_create_feedbacks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedbacks}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(10),
            'title' => $this->string(255),
            'text' => $this->text(),
            'rating' => $this->integer(5),
            'img' => $this->string(255),
            'user_id' => $this->integer(10),
            'date_create' => $this->string(30)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedbacks}}');
    }
}
