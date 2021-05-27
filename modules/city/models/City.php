<?php
namespace app\modules\city\models;

use app\modules\feedback\models\Feedback;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class City
 * @property int id
 * @property string name
 * @package app\modules\city\models
 */
class City  extends ActiveRecord
{
    /**
     * @return array
     */
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

    /**
     * @return string
     */
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
        return self::find()->with(['feedbacks'])->all();
    }

    /**
     * @return ActiveQuery
     */
    public function getFeedbacks(): ActiveQuery
    {
        return $this->hasMany(Feedback::class, ['city_id' => 'id']);
    }
}
