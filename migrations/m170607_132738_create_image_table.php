<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 */
class m170607_132738_create_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'id_post'=>$this->integer(),
            'name' => $this->string(),
        ]);


        $this->createIndex('ndx-image-id_post','image','id_post');
        $this->addForeignKey('fk-image-id_post','image','id_post','post','id','CASCADE');
    }



    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('image');
    }
}
