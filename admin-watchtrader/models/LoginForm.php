<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
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
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            
            if(isset($user->username)){
                // if (Yii::$app->getSecurity()->validatePassword($this->password, $user->password)) {
                if (sha1($this->password) === $user->password) {

                   
                    // all good, logging user in
                    
                } else {
                    $this->addError($attribute, 'Incorrect password.');
                    // wrong password
                    
                }
                
            }else{
                $this->addError('username', 'Incorrect username.');
            }
            // if (!$user || !$user->validatePassword($this->password)) {
            //     $this->addError($attribute, 'Incorrect username or password.');
            // }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            // echo 'bbb';
            // die();
            // $u = $this->getUser();
            // $jobs = $u->job;
            // $time = 3600;
            // if($jobs== 6 || $jobs == 10)
            //     $time = 3600 * 6;

            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            // echo 'aaa';
            // die();
            $this->_user = MasterUser::findByUsername($this->username);
        }

        return $this->_user;
    }
}
