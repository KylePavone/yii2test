<?php

use yii\db\Migration;

/**
 * Class m221109_082109_add_superuser_to_user_table
 */
class m221109_082109_add_superuser_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', array(
            'name' => 'admin',
            'email' => 'e@.gmail.com',
            'password' => Yii::$app->security->generatePasswordHash('admin'),
            'date_reg' => date("Y-m-d", time()),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221109_082109_add_superuser_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221109_082109_add_superuser_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
