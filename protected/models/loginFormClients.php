<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 21.11.12
 * Time: 1:47
 * To change this template use File | Settings | File Templates.
 */
class loginFormClients extends CFormModel
{

    public $login;
    public $password;
    public $rememberMe = true;
    private $_identity;

    public function rules()
    {
        return array(
            array('login, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }

    public function authenticate(){
        /** @var $login определено правилами присваивани€ this->rules()*/
        /** @var $password определено правилами присваивани€ this->rules()*/
        $identity = new UserIdentityClients($this->login, $this->password);
        $identity->authenticate();
        $duration=3600*24*30; // 30 days
        switch($identity->errorCode)
        {
            case UserIdentityClients::ERROR_NONE: Yii::app()->user->login($identity,$duration); return true; break;
            case UserIdentityClients::ERROR_PASSWORD_INVALID: $this->addError('login','Ќеправильное им€ пользовател€ или пароль.'); return false;    break;
            case UserIdentityClients::ERROR_USERNAME_INVALID: $this->addError('password','Ќеправильное им€ пользовател€ или пароль.'); return false;     break;
        }
    }

    public function attributeLabels()
    {
        return array(
            'password'=>'ѕароль.',
            'login'=>'Ћогин.',
        );
    }

}