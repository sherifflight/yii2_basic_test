<?php
namespace app\modules\city\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class City  extends ActiveRecord
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
        return '{{cities}}';
    }

    /**
     * @param string $name
     * @param array $with
     * @return City|null
     */
    public static function getCityByName(string $name, array $with = []) : ?City
    {
        return self::findOne(['name' => $name]);
    }

    /**
     * @return array|ActiveRecord[]
     */
    public static function getAllWithFeedback(): array
    {
        return self::find()->all();
    }
}
