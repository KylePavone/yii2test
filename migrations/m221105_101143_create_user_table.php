<?php

use yii\db\Migration;


/**
 * Handles the creation of table `{{%user}}`.
 */
class m221105_101143_create_user_table extends Migration
{
    public function randomPassword() {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'email' => $this->string(100)->notNull(),
            'password' => $this->string(100)->notNull(),//->defaultValue($this->randomPassword()),
            'date_reg' => $this->timestamp(),
        ]);
      /*  */
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
