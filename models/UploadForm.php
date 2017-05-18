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
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        $images = [];
        if ($this->validate(['imageFiles'])) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('images/uploads/' . $file->baseName . '.' . $file->extension);
                $images[] = $file->baseName . '.' . $file->extension;
            }
        }
        return implode('|', $images);

    }
}