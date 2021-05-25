<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use app\modules\user\models\User;

class RegisterForm extends Model
{
    public $full_name;
    public $email;
    public $phone;
    public $password;
    public $repeat_password;

    public function rules() : array
    {
        return [
            [['full_name', 'email', 'phone', 'password'], 'required'],
            ['email', 'email'],
            [['email', 'phone'],
                'unique',
                'targetClass' => User::class
            ]
        ];
    }

    /**
     * @param array $params
     * @return User|bool
     * @throws Exception
     */
    public function register(array $params)
    {
        if ($this->validate()) {
            $user = new User();
            // fixme: костыль, не пашут мутаторы или я что-то не так делаю ;( плак
            $params['password'] = Yii::$app->getSecurity()->generatePasswordHash($params['password']);

            $user->attributes = $params;
            $user->generateAuthKey();
            $user->save();

            return $user;
        }

        return false;
    }
}
