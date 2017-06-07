<?php

use yii\db\Migration;

/**
 * Handles dropping image from table `post`.
 */
class m170607_133937_drop_photos_column_from_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('post', 'photos');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('post', 'photos', $this->text());
    }
}
