<?php
namespace app\modules\feedback\models;

use yii\db\ActiveRecord;

class Feedback extends ActiveRecord
{
    public static function tableName() : string
    {
        return '{{feedbacks}}';
    }
}
