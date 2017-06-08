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
    public $photos;

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
            [['name', 'email', 'age', 'height', 'weight', 'city', 'credit', 'english'], 'required', 'when' => function($model) {
                return $model->imageFiles != null;}],
            [['age'], 'integer'],
            [['height', 'weight'], 'number'],
            [['credit', 'english'], 'string'],
            ['credit','in','range' => self::getCreditPlaceholders()],
            ['english','in','range' => self::getEnglishPlaceholders()],
            [['name', 'email'], 'string', 'max' => 30],
            [['city'], 'string', 'max' => 60],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email', 'message' => 'Не похоже на существующею имейл почту'],
            ['photos','string']
            //[['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5],
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

    /*public function upload(){
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

    }*/

    static function getEnglishPlaceholders(){

        $array =  [
            'без знания',
            'базовый',
            'средний',
            'высокий',
            'превосходный'
        ];

        return array_combine($array,$array);
    }

    static function getCreditPlaceholders(){
        $array =  [
           'нет',
            'да, только камера',
            'да, комп\'ютер и камера'
        ];

        // значення в якості ключа, для того щоб значення з форми приймалось в ENUM
        return array_combine($array,$array);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['id_post' => 'id']);
    }
}
