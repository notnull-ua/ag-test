<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m170516_135036_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'email' => $this->string(30)->unique()->notNull(),
            'age' => $this->integer()->unsigned()->notNull(),
            'height' => $this->float()->unsigned()->notNull(),
            'weight' => $this->float()->unsigned()->notNull(),
            'city' => $this->string(60)->notNull(),
            'credit' => "ENUM('нет','да, только камера','да, компьютер и камера') NOT NULL",
            'english' => "ENUM('без знания','базовый','средний','високий','превосходный') NOT NULL",
            'photos' => $this->text()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
