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
    public $imageFiles;

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
            [['name', 'email', 'age', 'height', 'weight', 'city', 'credit', 'english'], 'required'],
            [['age'], 'integer'],
            [['height', 'weight'], 'number'],
            [['credit', 'english'], 'string'],
            [['name', 'email'], 'string', 'max' => 30],
            [['city'], 'string', 'max' => 60],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email', 'message' => 'Не похоже на существующею имейл почту'],
            [['email'], 'unique'],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'age' => 'Возраст',
            'height' => 'Рост',
            'weight' => 'Вес',
            'city' => 'Город',
            'credit' => 'Нужна ли техника в кредит',
            'english' => 'Знание английского',
            'photos' => 'Добавить фото',
        ];
    }

    public function upload(){
        $images = [];
        if($this->validate(['imageFiles'])){
            foreach ($this->imageFiles as $file) {
                $file->saveAs('images/uploads/' . $file->baseName . '.' . $file->extension);
                $images[]=$file->baseName.'.'.$file->extension;
            }
            $this->photos = implode('|',$images);
            return true;
        }
        else return false;

    }
}
