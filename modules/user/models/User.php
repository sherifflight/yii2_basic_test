<?php
namespace app\modules\user\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord
{
    protected $_password;

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
        return '{{users}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['full_name', 'phone', 'email', 'password'], 'required']
        ];
    }

//    public function setPassword(string $password): void
//    {
//        $this->_password = Yii::$app->getSecurity()->generatePasswordHash($password);
//    }

//    public function getPassword(): string
//    {
//        return $this->_password;
//    }
}
