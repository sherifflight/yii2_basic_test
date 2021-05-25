<?php
namespace app\modules\user\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
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


    /**
     * @return int|mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|string $id
     * @return IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null) : ?IdentityInterface
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return string|null
     */
    public function getAuthKey() : ?string
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return bool|null
     */
    public function validateAuthKey($authKey) : ?bool
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

//    public function setPassword(string $password): void
//    {
//        $this->_password = Yii::$app->getSecurity()->generatePasswordHash($password);
//    }

//    public function getPassword(): string
//    {
//        return $this->password;
//    }
}
