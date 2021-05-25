<?php
namespace app\modules\feedback\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Feedback extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'date_create' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create']
                ]
            ]
        ];
    }

    public static function tableName() : string
    {
        return '{{feedbacks}}';
    }
}
