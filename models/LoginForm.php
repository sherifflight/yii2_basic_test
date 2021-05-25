<?php

namespace app\models;

use app\modules\user\models\User as UserModel;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            ['email', 'email'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
//            ['password', 'validatePassword'],
        ];
    }

    /**
     * @return bool
     */
    public function login() : bool
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }


    /**
     * @return UserModel|bool|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserModel::findOne(['email' => $this->email]);
        }

        return $this->_user;
    }
}
