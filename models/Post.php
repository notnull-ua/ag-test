<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $age
 * @property double $height
 * @property double $weight
 * @property string $city
 * @property string $credit
 * @property string $english
 * @property string $photos
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'age', 'height', 'weight', 'city', 'credit', 'english', 'photos'], 'required'],
            [['age'], 'integer'],
            [['height', 'weight'], 'number'],
            [['credit', 'english', 'photos'], 'string'],
            [['name', 'email'], 'string', 'max' => 30],
            [['city'], 'string', 'max' => 60],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'age' => 'Age',
            'height' => 'Height',
            'weight' => 'Weight',
            'city' => 'City',
            'credit' => 'Credit',
            'english' => 'English',
            'photos' => 'Photos',
        ];
    }
}
