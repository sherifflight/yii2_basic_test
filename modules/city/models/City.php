<?php
namespace app\modules\city\models;

use yii\db\ActiveRecord;

class City  extends ActiveRecord
{
    public static function tableName() : string
    {
        return '{{cities}}';
    }
}
