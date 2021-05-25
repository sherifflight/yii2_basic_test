<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210524_221959_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(100),
            'email' => $this->string(30)->unique(),
            'phone' => $this->string(15)->unique(),
            'authKey' => $this->string(30),
            'accessToken' => $this->string(30),
            'date_create' => $this->string(30),
            'password' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
