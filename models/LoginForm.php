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
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
//            ['password', 'validatePassword'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $user = UserModel::findOne(['email' => $this->email]);
        if ($user && $user->password) {
            if ($this->validate() && Yii::$app->getSecurity()->validatePassword($this->password, $user->password)){
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            }
        }
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
//        }
        return false;
    }

    /**
     * @return UserModel|bool|null
     */
    public function getUser()
    {
        if ($this->_user === false && $user = UserModel::findOne($this->email)) {
            $this->_user = $user;
        }

        return $this->_user;
    }
}
