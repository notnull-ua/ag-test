<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }

    public function upload()
    {
        $images = [];
        if ($this->validate(['imageFiles'])) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('./images/uploads/' . $file->baseName . '.' . $file->extension);
                $model= new Image();
                $model->name = $file->baseName . '.' . $file->extension;
                $model->save();
                $images[$model->id] = $model->name;
            }
        }
        return $images;

    }
}