<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int $id_post
 * @property string $name
 *
 * @property Post $post
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_post' => 'Id Post',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }
}
